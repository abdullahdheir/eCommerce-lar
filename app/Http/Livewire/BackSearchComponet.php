<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class BackSearchComponet extends Component
{
    public $sortting;
    public $pageinatting;
    public $search;
    public $product_cat_id;
    use WithPagination;

    public function mount()
    {
        $this->sortting = 'default';
        $this->pageinatting = 12;
        $this->fill(request()->only('search', 'product_cat_id'));
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
            $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('created_at', 'DESC')->paginate($this->pageinatting);
        } elseif ($this->sortting == 'price') {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('regular_price', 'ASC')->paginate($this->pageinatting);
        } elseif ($this->sortting == 'price-desc') {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('regular_price', 'DESC')->paginate($this->pageinatting);
        } elseif ($this->sortting == 'popularity') {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->orderByDesc('veiws')->paginate($this->pageinatting);
        } else {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->paginate($this->pageinatting);
        }
        $popular_products = Product::orderByDesc('veiws')->limit(5)->get();
        $cats = Category::all();
        $category = Category::where('id', $this->product_cat_id)->first();
        return view('livewire.back-search-componet', ['products' => $products, 'popular_products' => $popular_products, 'cats' => $cats, 'category' => $category])->layout('layouts.base');
    }
}
