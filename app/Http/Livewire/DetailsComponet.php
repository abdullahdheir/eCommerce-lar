<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class DetailsComponet extends Component
{
    public $slug;
    public $qty;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->qty = 1;
        $product = Product::where('slug', $this->slug)->first();
        Product::where('slug', $this->slug)->update([
            'veiws' =>  $product['veiws'] + 1
        ]);
    }

    public function increase()
    {
        $this->qty = $this->qty + 1;
    }

    public function decrease()
    {
        $this->qty = $this->qty - 1;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, $this->qty, $product_price)->associate('App\Models\Product');
        session()->flash('success', 'Product is Added to Cart Successfully !');
        return redirect()->route('cart');
    }


    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $popular_product = Product::orderByDesc('veiws')->limit(4)->get();
        $related_product = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(7)->get();
        return view('livewire.details-componet', ['d_product' => $product, 'popular_products' => $popular_product, 'related_products' => $related_product, 'product_qty' => $this->qty])->layout('layouts.base');
    }
}
