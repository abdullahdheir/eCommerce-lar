<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddProductComponet extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function mount()
    {
        $this->SKU = 'DIGI' . rand(100, 1000000);
        // $this->image =  $this->image;
        $this->featured = true;
        if (strlen($this->description) > 50) :
            $this->short_description = str_split($this->description, 50);
        else :
            $this->short_description = 'This Is A Tempory Description';
        endif;
    }


    public function store()
    {
        $uploadsImage =    $this->image->store('', 'img_product');
        $pro = new Product();
        $pro->name = $this->name;
        $pro->slug = $this->slug;
        $pro->short_description = $this->short_description;
        $pro->description = $this->description;
        $pro->regular_price = $this->regular_price;
        $pro->sale_price = $this->sale_price;
        $pro->SKU = $this->SKU;
        $pro->stock_status = $this->stock_status;
        $pro->featured = $this->featured;
        $pro->quantity = $this->quantity;
        $pro->image =  $uploadsImage;
        $pro->category_id = $this->category_id;
        $pro->created_at = now();
        $pro->save();
        session()->flash('success', 'The Product ' . $this->name . ' Inserted !!');
        return redirect()->route('admin.product');
    }

    public function render()
    {

        $cats = Category::all();

        return view('livewire.admin.product.add-product-componet', ['cats' => $cats])
            ->layout('layouts.guest');
    }
}
