<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class CateoryComponet extends Component
{

    public $slug;
    public $sortting;
    public $pageinatting;
    use WithPagination;

    public function mount($slug)
    {
        $this->slug = $slug;
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
        $cat =  Category::where('slug', $this->slug)->first();
        if ($this->sortting == 'date') {
            $cat_products = Product::where('category_id', $cat->id)->orderBy('created_at', 'DESC')->paginate($this->pageinatting);
        } elseif ($this->sortting == 'price') {
            $cat_products = Product::where('category_id', $cat->id)->orderBy('regular_price', 'ASC')->paginate($this->pageinatting);
        } elseif ($this->sortting == 'price-desc') {
            $cat_products = Product::where('category_id', $cat->id)->orderBy('regular_price', 'DESC')->paginate($this->pageinatting);
        } elseif ($this->sortting == 'popularity') {
            $cat_products = Product::where('category_id', $cat->id)->orderByDesc('veiws')->paginate($this->pageinatting);
        } else {
            $cat_products = Product::where('category_id', $cat->id)->paginate($this->pageinatting);
        }
        $cats = Category::all();
        $popular_products = Product::orderByDesc('veiws')->limit(5)->get();
        return view('livewire.cateory-componet', ['cat_products' => $cat_products, 'cats' => $cats, 'popular_products' => $popular_products, 'cateory' => $cat])
            ->layout('layouts.base');
    }
}
