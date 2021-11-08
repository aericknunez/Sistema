<?php

namespace App\Http\Livewire\Common;

use App\Models\TicketProducto;
use Livewire\Component;

class MenuVenta extends Component
{


    public function render()
    {
        return view('livewire.common.menu-venta');
    }



    public function selectRapida(){
        session(['clientes' => 1]);
        session(['config_tipo_servicio' => 1]);
        session(['llevar_aqui' => session('principal_llevar_rapida')]);
        session()->forget('orden');
        return redirect()->route('venta.rapida'); // redireccionno a la venta rapida
    }

    
    public function selectMesa(){
        if (session('config_tipo_servicio')  == 1) {
            if ($this->verificaCantidad()) {
                session(['config_tipo_servicio' => 2]);
                session(['llevar_aqui' => session('principal_llevar_mesa')]);
                return redirect()->route('venta.mesas'); 
            } else {
                $this->dispatchBrowserEvent('mensaje', ['clase' => 'success', 'titulo' => 'Error', 'texto' => 'Debe facturar o eliminar la orden actual antes de continuar']);
            }
        } else {
            session(['config_tipo_servicio' => 2]);
            session(['llevar_aqui' => session('principal_llevar_mesa')]);
            return redirect()->route('venta.mesas'); 
        }
        
    }



    public function selectDelivery(){
        if (session('config_tipo_servicio')  == 1) {
            if ($this->verificaCantidad()) {
                session(['config_tipo_servicio' => 3]);
                session(['llevar_aqui' => session('principal_llevar_delivery')]);
                return redirect()->route('venta.delivery'); 
            } else {
                $this->dispatchBrowserEvent('mensaje', ['clase' => 'success', 'titulo' => 'Error', 'texto' => 'Debe facturar o eliminar la orden actual antes de continuar']);
            }
        } else {
            session(['config_tipo_servicio' => 3]);
            session(['llevar_aqui' => session('principal_llevar_delivery')]);
            return redirect()->route('venta.delivery'); 
        }
        
    }



    public function verificaCantidad(){
        $cantidad = TicketProducto::where('orden', session('orden'))->count();
    
        if ($cantidad == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }




}
