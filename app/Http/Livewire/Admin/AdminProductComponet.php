<?php

namespace App\Http\Livewire\Admin;

use App\DataTables\ProductDataTable;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class AdminProductComponet extends Component
{

    public function render()
    {
        return view('livewire.admin.admin-product-componet')
            ->layout('layouts.base');
    }
}
