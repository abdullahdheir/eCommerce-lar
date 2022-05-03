<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class HomeComponat extends Component
{
    public function render()
    {
        $products = Product::where('regular_price', '>', 'sale_price')->limit(10)->get();
        $l_products = Product::orderBy('created_at', 'DESC')->limit(10)->get();
        return view('livewire.home-componat', ['laset_products' => $l_products, 'products' => $products])
            ->layout('layouts.base');
    }
}
