<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartComponet extends Component
{

    public function increareItem($rowId)
    {
        $row = Cart::get($rowId);
        $qy = $row->qty + 1;
        Cart::update($rowId, $qy);
    }

    public function decreareItem($rowId)
    {
        $row = Cart::get($rowId);
        $qy = $row->qty - 1;
        if ($qy >= 1) :
            Cart::update($rowId, $qy);
        endif;
    }

    public function deleteItem($rowId)
    {
        Cart::remove($rowId);
    }

    public function removeAll()
    {
        Cart::destroy();
    }

    public function render()
    {

        $most_products = Product::orderBy('veiws', 'DESC')->limit(20)->get();
        return view('livewire.cart-componet', ['most_products' => $most_products])
            ->layout('layouts.base');
    }
}
