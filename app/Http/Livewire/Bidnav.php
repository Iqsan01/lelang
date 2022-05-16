<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Bidnav extends Component
{
    public $bidTotal = 0;
    public function render()
    {
        return view('livewire.bidnav');
    }
}
