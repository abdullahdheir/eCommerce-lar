<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AllProductComponanet extends Component
{

    protected $paginationTheme  = 'Bootstrap';
    use WithPagination;

    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.all-product-componanet', ['products' => $products])->layout('layouts.app');
    }
}
