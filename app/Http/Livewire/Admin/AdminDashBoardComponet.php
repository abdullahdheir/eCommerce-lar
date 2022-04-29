<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminDashBoardComponet extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-dash-board-componet')->layout('layouts.base');
    }
}
