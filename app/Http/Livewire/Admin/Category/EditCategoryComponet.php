<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;

class EditCategoryComponet extends Component
{
    public $header_slug;
    public $slug;
    public $name;

    public function mount($header_slug)
    {
        $this->header_slug = $header_slug;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updateCategory()
    {
        $cat = Category::where('slug', $this->header_slug)->first();
        $findCat = Category::where('slug', $this->slug)->first();
        if ($findCat == null) :
            if (strlen($this->name) < 4) :
                session()->flash('error', 'Should Be More Than 4 Characater');
            else :
                Category::where('slug', $this->header_slug)->update([
                    'name' => $this->name,
                    'slug' => $this->slug,
                    'updated_at' => now()
                ]);
                session()->flash('success', 'Updated Category From ' . $cat->name . ' To ' . $this->name . ' Successfully !');
                return redirect()->route('admin.cat');
            endif;
        else :
            session()->flash('error', 'This Category Exitst');
        endif;
    }

    public function render()
    {
        $cat = Category::where('slug', $this->header_slug)->first();
        if ($cat != null) :
            return view('livewire.admin.category.edit-componet', ['cat' => $cat])
                ->layout('layouts.base');
        else :
            $cats = Category::paginate(5);
            $products_count = Product::where('category_id', $this->cat_id)->count();
            return view('livewire.admin.admin-category-componet', ['cats' => $cats, 'products_count' => $products_count])
                ->layout('layouts.base');
        endif;
    }
}
