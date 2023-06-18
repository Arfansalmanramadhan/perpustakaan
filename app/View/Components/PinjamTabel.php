<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PinjamTabel extends Component
{
    public $catatan;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($catatan)
    {
        $this->catatan = $catatan;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pinjam-tabel');
    }
}
