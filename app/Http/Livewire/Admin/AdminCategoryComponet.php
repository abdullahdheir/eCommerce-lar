<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryComponet extends Component
{

    use WithPagination;

    public function deleteCat($cat_id)
    {
        Category::where('id', $cat_id)->delete();
        session()->flash('success', 'Category Deleted Successfully ');
    }
    public function render()
    {
        $cats = Category::paginate(5);
        $cat_all = Category::all();
        $products_count = array();
        foreach ($cat_all as $cat) :
            $products_count[$cat->id] =  Product::where('category_id', $cat->id)->count();
        endforeach;
        return view('livewire.admin.admin-category-componet', ['cats' => $cats, 'products_count' => $products_count])
            ->layout('layouts.base');
    }
}
