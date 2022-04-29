<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AboutComponet extends Component
{
    public function render()
    {
        return view('livewire.about-componet')
            ->layout('layouts.base');
    }
}
