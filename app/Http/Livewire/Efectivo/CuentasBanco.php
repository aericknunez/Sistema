<?php

namespace App\Http\Livewire\Efectivo;

use App\Common\Helpers;
use App\Models\EfectivoCuentaBancos;
use App\System\Efectivo\EfectivoCuentas;
use Livewire\Component;

class CuentasBanco extends Component
{

    use EfectivoCuentas;


    public $tipo, $cuenta, $banco, $saldo;
    public $datos = [];


    public $origen = 1, $destino = 1, $cantidad;
    public $origenx, $destinox;



    protected $rules = [
        'tipo' => 'required',
        'cuenta' => 'required',
        'banco' => 'required|min:3',
        'saldo' => 'required',

    ];


    protected $listeners = ['EliminarCuenta' => 'destroy']; // escucah el evento Eliminar



    public function mount(){
        $this->tipo = 3;
        $this->getCuentas();
        
    }

    

    public function render()
    {
        $this->origenx = $this->updateDataOrigenDestino($this->origen);
        $this->destinox = $this->updateDataOrigenDestino($this->destino);

        return view('livewire.efectivo.cuentas-banco');
    }


    public function btnCuenta(){
         
        $this->validate();

        EfectivoCuentaBancos::create([
            'tipo' => $this->tipo,
            'cuenta' => $this->cuenta,
            'banco' => $this->banco,
            'saldo' => $this->saldo,
            'edo' => 1,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);

        $this->reset();
        $this->emit('creado'); // manda el mensaje de creado
        $this->getCuentas();

    }


    public function getCuentas(){
        
        $this->datos = EfectivoCuentaBancos::where('edo', 1)
                                            ->orderBy('tiempo', 'desc')
                                            ->get();
    }


    public function destroy($id){

        $cuenta = EfectivoCuentaBancos::find($id);

        if($id == 1){
            $this->emit('error4'); // manda el mensaje de error al eliminar
        } elseif ($cuenta->saldo == 0) {
            $cuenta->delete();  
            $this->dispatchBrowserEvent('mensaje', 
            ['clase' => 'success', 
            'titulo' => 'Realizado', 
            'texto' => 'Cuenta Eliminada correctamente']);
    
            $this->getCuentas();
        } else {
            $this->emit('error'); // manda el mensaje de error al eliminar
        }

    }

    public function btnTransferir(){
        $this->validate([
            'cantidad' => 'required',
        ]);

        $inicio = $this->updateDataOrigenDestino($this->origen);
        $fin = $this->updateDataOrigenDestino($this->destino);

        if ($this->origen == $this->destino) {
            $this->emit('error1'); // origen y destino son iguales
        }
        elseif ($inicio[0]['saldo'] == 0) {
            $this->emit('error2'); // origen no tiene fondos
        }
        elseif ($this->cantidad > $inicio[0]['saldo']) {
            $this->emit('error3'); // origen y destino son iguales
        } else{

            $this->updateSaldo($this->origen, $this->destino, $inicio[0]['saldo'], $fin[0]['saldo'], $this->cantidad); /// actualiza el saldo en orige y destino
            $this->crearHistorialTransferencias($this->origen, $this->destino, $inicio[0]['saldo'], $fin[0]['saldo'], $this->cantidad, "Transferencia entre cuentas");
            $this->getCuentas();
            $this->emit('transfer'); // origen y destino son iguales
        }
    }



}
