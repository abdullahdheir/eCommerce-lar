<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserDashBoardComponet extends Component
{
    public function render()
    {
        return view('livewire.user.user-dash-board-componet')->layout('layouts.base');
    }
}
