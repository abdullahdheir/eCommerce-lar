<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use PDF;

class DownLoadPdf extends Controller
{
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
    public function index()
    {
        $products = Product::all();
        $productName = array();
        foreach ($products as $pro) :
            $productName[$pro->id] = Category::where('id', $pro->category_id)->first()->name;
        endforeach;
        return view('pdf', ['productName' => $productName, 'products' => $products]);
    }
}
