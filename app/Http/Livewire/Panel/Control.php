<?php

namespace App\Http\Livewire\Panel;

use App\Common\Helpers;
use App\Models\TicketNum;
use App\System\Panel\DatosDia;
use Livewire\Component;

class Control extends Component
{
    use DatosDia;

    public $datos = [];


    public function mount(){
        $this->getHoras();
        $this->getFormat();
        $this->getData();
        $this->getDataCard();
    }
    
    public function render()
    {
        return view('livewire.panel.control');
    }

    public function getHoras(){
        
        $this->datos['h24'] = date('d-m-Y 23:00:00');
        $this->datos['h23'] = date('d-m-Y 22:00:00');
        $this->datos['h22'] = date('d-m-Y 21:00:00');
        $this->datos['h21'] = date('d-m-Y 20:00:00');
        $this->datos['h20'] = date('d-m-Y 19:00:00');
        $this->datos['h19'] = date('d-m-Y 18:00:00');
        $this->datos['h18'] = date('d-m-Y 17:00:00');
        $this->datos['h17'] = date('d-m-Y 16:00:00');
        $this->datos['h16'] = date('d-m-Y 15:00:00');
        $this->datos['h15'] = date('d-m-Y 14:00:00');
        $this->datos['h14'] = date('d-m-Y 13:00:00');
        $this->datos['h13'] = date('d-m-Y 12:00:00');
        $this->datos['h12'] = date('d-m-Y 11:00:00');
        $this->datos['h11'] = date('d-m-Y 10:00:00');
        $this->datos['h10'] = date('d-m-Y 09:00:00');
        $this->datos['h9'] = date('d-m-Y 08:00:00');
        $this->datos['h8'] = date('d-m-Y 07:00:00');
        $this->datos['h7'] = date('d-m-Y 06:00:00');
        $this->datos['h6'] = date('d-m-Y 05:00:00');
        $this->datos['h5'] = date('d-m-Y 04:00:00');
        $this->datos['h4'] = date('d-m-Y 03:00:00');
        $this->datos['h3'] = date('d-m-Y 02:00:00');
        $this->datos['h2'] = date('d-m-Y 01:00:00');
        $this->datos['h1'] = date('d-m-Y 00:00:00');

        // $this->datos['h24'] = date('d-m-Y H:00:00');
        // $this->datos['h23'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 1 hours"));
        // $this->datos['h22'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 2 hours"));
        // $this->datos['h21'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 3 hours"));
        // $this->datos['h20'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 4 hours"));
        // $this->datos['h19'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 5 hours"));
        // $this->datos['h18'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 6 hours"));
        // $this->datos['h17'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 7 hours"));
        // $this->datos['h16'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 8 hours"));
        // $this->datos['h15'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 9 hours"));
        // $this->datos['h14'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 10 hours"));
        // $this->datos['h13'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 11 hours"));
        // $this->datos['h12'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 12 hours"));
        // $this->datos['h11'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 13 hours"));
        // $this->datos['h10'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 14 hours"));
        // $this->datos['h9'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 15 hours"));
        // $this->datos['h8'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 16 hours"));
        // $this->datos['h7'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 17 hours"));
        // $this->datos['h6'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 18 hours"));
        // $this->datos['h5'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 19 hours"));
        // $this->datos['h4'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 20 hours"));
        // $this->datos['h3'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 21 hours"));
        // $this->datos['h2'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 22 hours"));
        // $this->datos['h1'] = date("d-m-Y H:00:00", strtotime(date('H:00:00') ."- 23 hours"));
        
    }

    public function getFormat(){
        $this->datos['f24'] = Helpers::fechaFormat($this->datos['h24']);
        $this->datos['f23'] = Helpers::fechaFormat($this->datos['h23']);
        $this->datos['f22'] = Helpers::fechaFormat($this->datos['h22']);
        $this->datos['f21'] = Helpers::fechaFormat($this->datos['h21']);
        $this->datos['f20'] = Helpers::fechaFormat($this->datos['h20']);
        $this->datos['f19'] = Helpers::fechaFormat($this->datos['h19']);
        $this->datos['f18'] = Helpers::fechaFormat($this->datos['h18']);
        $this->datos['f17'] = Helpers::fechaFormat($this->datos['h17']);
        $this->datos['f16'] = Helpers::fechaFormat($this->datos['h16']);
        $this->datos['f15'] = Helpers::fechaFormat($this->datos['h15']);
        $this->datos['f14'] = Helpers::fechaFormat($this->datos['h14']);
        $this->datos['f13'] = Helpers::fechaFormat($this->datos['h13']);
        $this->datos['f12'] = Helpers::fechaFormat($this->datos['h12']);
        $this->datos['f11'] = Helpers::fechaFormat($this->datos['h11']);
        $this->datos['f10'] = Helpers::fechaFormat($this->datos['h10']);
        $this->datos['f9'] = Helpers::fechaFormat($this->datos['h9']);
        $this->datos['f8'] = Helpers::fechaFormat($this->datos['h8']);
        $this->datos['f7'] = Helpers::fechaFormat($this->datos['h7']);
        $this->datos['f6'] = Helpers::fechaFormat($this->datos['h6']);
        $this->datos['f5'] = Helpers::fechaFormat($this->datos['h5']);
        $this->datos['f4'] = Helpers::fechaFormat($this->datos['h4']);
        $this->datos['f3'] = Helpers::fechaFormat($this->datos['h3']);
        $this->datos['f2'] = Helpers::fechaFormat($this->datos['h2']);
        $this->datos['f1'] = Helpers::fechaFormat($this->datos['h1']);
        
    }



    public function getData(){
        $this->datos['d1'] = TicketNum::whereBetween('tiempo', [$this->datos['f1'], $this->datos['f1'] + 3599])->sum('total');
        $this->datos['d2'] = TicketNum::whereBetween('tiempo', [$this->datos['f2'], $this->datos['f2'] + 3599])->sum('total');
        $this->datos['d3'] = TicketNum::whereBetween('tiempo', [$this->datos['f3'], $this->datos['f3'] + 3599])->sum('total');
        $this->datos['d4'] = TicketNum::whereBetween('tiempo', [$this->datos['f4'], $this->datos['f4'] + 3599])->sum('total');
        $this->datos['d5'] = TicketNum::whereBetween('tiempo', [$this->datos['f5'], $this->datos['f5'] + 3599])->sum('total');
        $this->datos['d6'] = TicketNum::whereBetween('tiempo', [$this->datos['f6'], $this->datos['f6'] + 3599])->sum('total');
        $this->datos['d7'] = TicketNum::whereBetween('tiempo', [$this->datos['f7'], $this->datos['f7'] + 3599])->sum('total');
        $this->datos['d8'] = TicketNum::whereBetween('tiempo', [$this->datos['f8'], $this->datos['f8'] + 3599])->sum('total');
        $this->datos['d9'] = TicketNum::whereBetween('tiempo', [$this->datos['f9'], $this->datos['f9'] + 3599])->sum('total');
        $this->datos['d10'] = TicketNum::whereBetween('tiempo', [$this->datos['f10'], $this->datos['f10'] + 3599])->sum('total');
        $this->datos['d11'] = TicketNum::whereBetween('tiempo', [$this->datos['f11'], $this->datos['f11'] + 3599])->sum('total');
        $this->datos['d12'] = TicketNum::whereBetween('tiempo', [$this->datos['f12'], $this->datos['f12'] + 3599])->sum('total');
        $this->datos['d13'] = TicketNum::whereBetween('tiempo', [$this->datos['f13'], $this->datos['f13'] + 3599])->sum('total');
        $this->datos['d14'] = TicketNum::whereBetween('tiempo', [$this->datos['f14'], $this->datos['f14'] + 3599])->sum('total');
        $this->datos['d15'] = TicketNum::whereBetween('tiempo', [$this->datos['f15'], $this->datos['f15'] + 3599])->sum('total');
        $this->datos['d16'] = TicketNum::whereBetween('tiempo', [$this->datos['f16'], $this->datos['f16'] + 3599])->sum('total');
        $this->datos['d17'] = TicketNum::whereBetween('tiempo', [$this->datos['f17'], $this->datos['f17'] + 3599])->sum('total');
        $this->datos['d18'] = TicketNum::whereBetween('tiempo', [$this->datos['f18'], $this->datos['f18'] + 3599])->sum('total');
        $this->datos['d19'] = TicketNum::whereBetween('tiempo', [$this->datos['f19'], $this->datos['f19'] + 3599])->sum('total');
        $this->datos['d20'] = TicketNum::whereBetween('tiempo', [$this->datos['f20'], $this->datos['f20'] + 3599])->sum('total');
        $this->datos['d21'] = TicketNum::whereBetween('tiempo', [$this->datos['f21'], $this->datos['f21'] + 3599])->sum('total');
        $this->datos['d22'] = TicketNum::whereBetween('tiempo', [$this->datos['f22'], $this->datos['f22'] + 3599])->sum('total');
        $this->datos['d23'] = TicketNum::whereBetween('tiempo', [$this->datos['f23'], $this->datos['f23'] + 3599])->sum('total');
        $this->datos['d24'] = TicketNum::whereBetween('tiempo', [$this->datos['f24'], $this->datos['f24'] + 3599])->sum('total');
    }


    public function getDataCard(){
        $this->datos['total_efectivo'] = $this->totalEfectivo(date('Y-m-d'));
        $this->datos['total_tarjeta'] = $this->totalTarjeta(date('Y-m-d'));
        $this->datos['total_btc'] = $this->totalBtc(date('Y-m-d'));
        $this->datos['total_venta'] = $this->totalVenta(date('Y-m-d'));
        
        $this->datos['propina_efectivo'] = $this->propinaEfectivo(date('Y-m-d'));
        $this->datos['propina_no_efectivo'] = $this->propinaNoEfectivo(date('Y-m-d'));
        $this->datos['gastos'] = $this->gastosEfectivo(date('Y-m-d'));
        $this->datos['remesas'] = $this->remesas(date('Y-m-d'));
        
    }


}
