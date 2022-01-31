<?php

namespace App\Http\Livewire\Efectivo;

use App\Common\Helpers;
use App\Models\EfectivoCuentaBancos;
use App\Models\EfectivoRemesas;
use App\System\Corte\Corte;
use App\System\Efectivo\EfectivoCuentas;
use Livewire\Component;

class Remesas extends Component
{
    use Corte, EfectivoCuentas;

    public $datos;
    public $bancos;
    public $nombre, $descripcion, $cantidad, $comprobante, $idbanco;
    public $totalremesas;


    protected $listeners = ['EliminarRemesa' => 'destroy']; // escucah el evento Eliminar

    protected $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'cantidad' => 'required'
    ];


    public function mount(){
        $this->idbanco = 1;
        $this->getRemesas();
        $this->getCuentas();
        $this->remesasTotal();
    }

    public function render()
    {
        return view('livewire.efectivo.remesas');
    }



    public function getRemesas(){
        
        $this->datos = EfectivoRemesas::where('cajero', session('config_usuario_id'))
                                            ->whereBetween('tiempo', [$this->inicioCorte(session('config_usuario_id')), Helpers::timeId()])
                                            ->with('banco')
                                            ->orderBy('tiempo', 'desc')
                                            ->get();
    }

    public function btnRemesa(){
        
        $this->validate();

        EfectivoRemesas::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'cantidad' => $this->cantidad,
            'fechaT' => Helpers::timeId(),
            'cajero' => session('config_usuario_id'),
            'edo' => 1,
            'no_comprobante' => $this->comprobante,
            'efectivo_cuenta_bancos_id' => $this->idbanco,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);

        // obtiene total para sumarlo a la cuenta y crear historial
        $efectivo = $this->updateDataOrigenDestino($this->idbanco);
        $totalx = $efectivo[0]['saldo'] + $this->cantidad;
        $this->crearHistorialUnico($this->idbanco, $efectivo[0]['saldo'], $totalx, $this->cantidad, "Remesa de Efectivo"); // registra la remesa en el historial
        $this->updateCta($this->idbanco, $totalx); /// actualiza el saldo en orige y destino

        
        $this->reset();
        $this->idbanco = 1;
        $this->emit('creado'); // manda el mensaje de creado
        $this->getRemesas();
        $this->getCuentas();
        $this->remesasTotal();

    }



    public function destroy($id){

        EfectivoRemesas::where('id', $id)
                        ->update(['edo' => 2,
                                'tiempo' => Helpers::timeId()
        ]);

        $remesa = EfectivoRemesas::select(['cantidad','efectivo_cuenta_bancos_id'])
                        ->where('id', $id)
                        ->first();
        // obtiene total para sumarlo a la cuenta y crear historial
        $efectivo = $this->updateDataOrigenDestino($remesa->efectivo_cuenta_bancos_id);
        $totalx = $efectivo[0]['saldo'] - $remesa->cantidad;
        $this->crearHistorialUnico($remesa->efectivo_cuenta_bancos_id, $efectivo[0]['saldo'], $totalx, $remesa->cantidad, "Remesa de efectivo Eliminada"); // registra la remesa en el historial
        $this->updateCta($remesa->efectivo_cuenta_bancos_id, $totalx); /// actualiza el saldo en orige y destino



        $this->dispatchBrowserEvent('mensaje', 
            ['clase' => 'success', 
            'titulo' => 'Realizado', 
            'texto' => 'Remesa Eliminada correctamente']);

        $this->getRemesas();
        $this->remesasTotal();
    }



    public function getCuentas(){     
        $this->bancos = EfectivoCuentaBancos::where('edo', 1)
                                            ->orderBy('tiempo', 'desc')
                                            ->get();
    }

    public function remesasTotal(){
        $this->totalremesas = $this->remesas($this->inicioCorte(session('config_usuario_id')), Helpers::timeId(), session('config_usuario_id'));
    }




}
