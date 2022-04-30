<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class DetailsComponet extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success', 'Product is Added to Cart Successfully !');
        return redirect()->route('cart');
    }


    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $popular_product = Product::inRandomOrder()->limit(4)->get();
        $related_product = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(7)->get();
        return view('livewire.details-componet', ['d_product' => $product, 'popular_products' => $popular_product, 'related_products' => $related_product])->layout('layouts.base');
    }
}
