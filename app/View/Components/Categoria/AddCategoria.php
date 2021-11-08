<?php

namespace App\View\Components\Categoria;

use Illuminate\View\Component;

class AddCategoria extends Component
{



    public $imgSelected;

    
    public function __construct($imgSelected)
    {
        $this->imgSelected = $imgSelected;
    }


    
    public function render()
    {
        return view('components.categoria.add-categoria');
    }
}
