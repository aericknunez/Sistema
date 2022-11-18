<?php

namespace App\Http\Livewire\Panel;

use App\Common\Helpers;
use App\Models\ConfigPaneles;
use App\Models\TicketOrden;
use App\Models\TicketProducto;
use App\Models\User;
use App\System\Imprimir\ImprimirConPantalla;
use App\System\Ventas\Ventas;
use Livewire\Component;

class Pantalla extends Component
{
    use Ventas, ImprimirConPantalla;

    protected $listeners = ['Ordenes' => 'getOrdenes'];



    public $datos = [];
    public $retirados = [];

    public $panelImprimir;
    public $listadoPaneles =[];

    public $terminadas;
    public $limitTerminadas;

    public $sound;
    public $hashSound = 1;



    public function mount(){
        $this->panelImprimir = 1;
        $this->getOrdenes();
        $this->getPanels();
        $this->limitTerminadas = 20;
    }


    public function render()
    {
        return view('livewire.panel.pantalla');
    }

    public function getOrdenes(){
    
            $this->datos = TicketOrden::addSelect(['usuario' => User::select('name')
                                        ->whereColumn('empleado', 'users.id')])
                                        ->where('imprimir', 1)
                                        ->with('productos')
                                        ->with('productos.subOpcion')->get();

            if(session('pusher')){
                $this->emit('sound'); // sonido 
            } else {
                $this->sound = sha1($this->datos);
                $this->emitSound($this->sound);
            }
    }



    public function emitSound($datos){ // compara si son los mismos datos, sino emite el sonido
        if($datos != $this->hashSound){
            $this->hashSound = $datos;
            $this->emit('sound'); // sonido 
        }
    }


    public function getRetirados(){
    
        $this->retirados = TicketOrden::addSelect(['usuario' => User::select('name')
                                    ->whereColumn('empleado', 'users.id')])
                                    ->where('imprimir', 3)
                                    ->with('productos')
                                    ->with('productos.subOpcion')->get();
        
    }

    
    public function deleteProduct($producto, $orden){
        TicketProducto::where('id', $producto)
                        ->update(['imprimir' => 3, 'tiempo' => Helpers::timeId()]);

        /// verificar si eliminamos o no 
        $cantidad = TicketProducto::where('orden', $orden)
                    ->where('imprimir','!=', 3)->count();

        if ($cantidad == 0) {
            $this->estadoImprimirOrden($orden, 0);
        }

        $this->getOrdenes();
    }


    public function deleteOrden($orden){
        $cantidad = TicketProducto::where('orden', $orden)
                                    ->where('imprimir', 1)
                                    ->count();
        
        if ($cantidad == 0) {
            TicketProducto::where('orden', $orden)
                          ->where('imprimir', 2)
                          ->where('panel', $this->panelImprimir)
                          ->update(['imprimir' => 3, 'tiempo' => Helpers::timeId()]);
        }
        // imprime la comanda de la pantalla si esta activa la funcion
        $this->productosComandaConPantalla($this->panelImprimir);

        $cant = TicketProducto::where('orden', $orden)
                ->where('imprimir','!=', 3)->count();

        if ($cant == 0) {
            $this->estadoImprimirOrden($orden, 0);
        }
        
        $this->getOrdenes();
    }


    public function deleteProductsGroup($cod, $orden, $limit){
        TicketProducto::where('cod', $cod)
                        ->where('orden', $orden)
                        ->update(['imprimir' => 3, 'tiempo' => Helpers::timeId()]);

        // imprime la comanda de la pantalla si esta activa la funcion
        $this->productosComandaConPantalla($this->panelImprimir, $limit, $cod, true);
        /// verificar si eliminamos o no 
        $cantidad = TicketProducto::where('orden', $orden)
                    ->where('imprimir','!=', 3)->count();

        if ($cantidad == 0) {
            $this->estadoImprimirOrden($orden, 0);
        }

        $this->getOrdenes();
    }



    public function getPanels(){
    
        $this->listadoPaneles = ConfigPaneles::where('edo', 1)->orderBy('id', 'desc')->get();
        
    }


    public function cambiarPanel($iden){
        $this->panelImprimir = $iden;
        $this->getOrdenes();
    }




    public function getTerminadas(){
    
        $this->terminadas = TicketProducto::whereIn('imprimir', [3, 4])
                                    ->where('edo', 1)
                                    ->with('subOpcion')
                                    ->with('user')
                                    ->orderBy('tiempo', 'desc')
                                    ->limit($this->limitTerminadas)
                                    ->get();
    }

    public function verMasTerminadas(){
        $this->limitTerminadas = $this->limitTerminadas + 20;
        $this->getTerminadas();
    }

    public function cerrarModalTerminadas(){
        $this->limitTerminadas = 20;
        $this->reset(['terminadas']);
    }




}
