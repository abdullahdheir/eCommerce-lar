<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use PDF;

class DownloadPDFComponet extends Component
{
    public function mount()
    {
        $products =  Product::all();
        $productName = array();
        foreach ($products as $pro) :
            $productName[$pro->id] = Category::where('id', $pro->category_id)->first()->name;
        endforeach;
        view()->share('products', $products);
        view()->share('productName', $productName);
        $html = view('pdf')->render();
        $pdf = PDF::loadHTML($html);
        return $pdf->download('Products.pdf');
    }
    public function render()
    {

        $products =  Product::all();
        $productName = array();
        foreach ($products as $pro) :
            $productName[$pro->id] = Category::where('id', $pro->category_id)->first()->name;
        endforeach;
        return view('pdf', compact('products', 'productName'));
    }
}
