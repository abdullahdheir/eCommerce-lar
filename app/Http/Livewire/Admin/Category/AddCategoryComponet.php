<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use illuminate\Support\Str;

class AddCategoryComponet extends Component
{
    public $name;
    public $slug;
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function storeCategory()
    {
        $cat = new Category();
        $findCat = Category::where('slug', $this->slug)->first();
        if ($findCat == null) :
            if (strlen($this->name) < 4) :
                session()->flash('error', 'Should Be More Than 4 Characater');
            else :
                $cat->name = $this->name;
                $cat->slug = $this->slug;
                $cat->created_at = now();
                $cat->save();
                session()->flash('success', 'Added Category ' . $this->name . ' Successfully !');
                return redirect()->route('admin.cat');
            endif;
        else :
            session()->flash('error', 'This Category Exitst');
        endif;
    }
    public function render()
    {
        return view('livewire.admin.category.add-category-componet')
            ->layout('layouts.base');
    }
}
