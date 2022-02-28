<?php

namespace App\View\Components\table;

use Illuminate\View\Component;

class table_th extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $sortable;
    public function __construct($name, $sortable)
    {
        $this->name = $name;
        $this->sortable = $sortable;
    }
   

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.table_th');
    }
}
