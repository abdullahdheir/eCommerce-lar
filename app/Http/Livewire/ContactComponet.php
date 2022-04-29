<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactComponet extends Component
{
    public function render()
    {
        return view('livewire.contact-componet')
            ->layout('layouts.base');
    }
}
