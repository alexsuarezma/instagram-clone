<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Follows extends Component
{
    public $user;
    
    public function render()
    {
        return view('livewire.follows');
    }
}
