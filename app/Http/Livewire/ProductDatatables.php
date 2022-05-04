<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ProductDatatables extends LivewireDatatable
{
    public $model = Product::class;

    function columns()
    {
        return [
            NumberColumn::name('id')->label('ID')->sortBy('id'),
            Column::name('name')->label('Name'),
            Column::name('short_description')->label('Short Description'),
            Column::name('regular_price')->label('Regular Price'),
            Column::name('sale_price')->label('Sale Price'),
            DateColumn::name('created_at')->label('Creation Date'),
            DateColumn::name('updated_at')->label('Updation Date')
        ];
    }
}
