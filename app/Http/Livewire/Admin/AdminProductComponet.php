<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;


class AdminProductComponet extends Component
{
    use WithPagination;
    public $pagation;
    public $search;
    public $sortBy;
    public $sortByOrder;

    public function mount()
    {
        $this->pagation = 10;
        $this->sortBy = 'default';
        $this->sortByOrder = 'ASC';
    }

    public function createProductPdf()
    {
        $products =  Product::all();
        $productName = array();
        foreach ($products as $pro) :
            $productName[$pro->id] = Category::where('id', $pro->category_id)->first()->name;
        endforeach;
        $pdf = PDF::loadView('pdf', compact('products', 'productName'));
        return $pdf->download('Products.pdf');
    }

    public function sortTable($sort)
    {
        if ($this->sortBy == $sort && $this->sortByOrder == 'ASC') :
            $this->sortBy = $sort;
            $this->sortByOrder = 'DESC';
        else :
            $this->sortBy = $sort;
            $this->sortByOrder = 'ASC';
        endif;
    }
    public function deleteProduct($id)
    {
        $pro =  Product::where('id', $id)->first();
        Product::where('id', $id)->delete();
        session()->flash('success', 'Product That Name ' . $pro->name . ' Deleted Successfully ');
    }

    public function render()
    {
        $sortBy = $this->sortBy;
        $sortByOrder = $this->sortByOrder;
        if ($sortBy != 'default') :
            if (!empty($this->search)) :
                $products = Product::where('name', 'like', '%' . $this->search . '%')->orWhere('regular_price', 'like', '%' . $this->search . '%')->orderBy($sortBy, $sortByOrder)->paginate($this->pagation);
            else :
                $products = Product::orderBy($sortBy, $sortByOrder)->paginate($this->pagation);
            endif;
        else :
            if (!empty($this->search)) :
                $products = Product::where('name', 'like', '%' . $this->search . '%')->orWhere('regular_price', 'like', '%' . $this->search . '%')->paginate($this->pagation);
            else :
                $products = Product::paginate($this->pagation);
            endif;
        endif;
        $productName = array();
        foreach ($products as $pro) :
            $productName[$pro->id] = Category::where('id', $pro->category_id)->first()->name;
        endforeach;
        return view('livewire.admin.admin-product-componet', ['products' => $products, 'productName' => $productName])
            ->layout('layouts.base');
    }
}
