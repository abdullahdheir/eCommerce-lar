<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HomeComponat extends Component
{
    public function render()
    {
        return view('livewire.home-componat')
            ->layout('layouts.base');
    }
}
