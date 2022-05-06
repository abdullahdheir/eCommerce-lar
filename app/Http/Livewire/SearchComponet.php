<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class SearchComponet extends Component
{

    public $search;
    public $product_name;
    public $product_cat;
    public $product_cat_id;

    public function mount()
    {
        $this->product_cat = 'All Category';
        $this->fill(request()->only('search', 'product_cat', 'product_cat_id'));
    }

    public function render()
    {
        $cats = Category::all();
        if (!empty($this->product_name)) :
            $products = Product::where('name', "like", '%' . $this->product_name . '%')->orWhere('slug', 'like', '%' . $this->product_name . '%')->limit(10)->get();
            return view('livewire.search-componet', ['cats' => $cats, 'products' => $products]);
        else :
            return view('livewire.search-componet', ['cats' => $cats]);
        endif;
    }
}
