<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponet extends Component
{
    // protected $paginationTheme = 'bootstrap';?
    public $sortting;
    public $pageinatting;
    use WithPagination;

    public function mount()
    {
        $this->sortting = 'default';
        $this->pageinatting = 12;
    }
    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success', 'Product is Added to Cart Successfully !');
        return redirect()->route('cart');
    }

    public function render()
    {
        if ($this->sortting == 'date') {
            $products = Product::orderBy('created_at', 'DESC')->paginate($this->pageinatting);
        } elseif ($this->sortting == 'price') {
            $products = Product::orderBy('regular_price', 'ASC')->paginate($this->pageinatting);
        } elseif ($this->sortting == 'price-desc') {
            $products = Product::orderBy('regular_price', 'DESC')->paginate($this->pageinatting);
        } elseif ($this->sortting == 'popularity') {
            $products = Product::orderByDesc('veiws')->paginate($this->pageinatting);
        } else {
            $products = Product::paginate($this->pageinatting);
        }
        $popular_products = Product::orderByDesc('veiws')->limit(5)->get();
        $cats = Category::all();
        return view('livewire.shop-componet', ['products' => $products, 'popular_products' => $popular_products, 'cats' => $cats])->layout('layouts.base');
    }
}
