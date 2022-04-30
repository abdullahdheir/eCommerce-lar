<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponet extends Component
{

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success', 'Product is Added to Cart Successfully !');
        return redirect()->route('cart');
    }

    use WithPagination;
    public function render()
    {
        $products = Product::paginate(12);
        return view('livewire.shop-componet', ['products' => $products])
            ->layout('layouts.base');
    }
}
