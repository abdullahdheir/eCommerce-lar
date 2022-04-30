<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartComponet extends Component
{

    public function increareItem($rowId)
    {
        $row = Cart::get($rowId);
        $qy = $row->qty + 1;
        Cart::update($rowId, $qy);
        return redirect()->route('cart');
    }

    public function decreareItem($rowId)
    {
        $row = Cart::get($rowId);
        $qy = $row->qty - 1;
        if ($qy > 1) :
            Cart::update($rowId, $qy);
        endif;
        return redirect()->route('cart');
    }

    public function deleteItem($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart');
    }

    public function removeAll()
    {
        Cart::destroy();
        return redirect()->route('cart');
    }

    public function render()
    {
        return view('livewire.cart-componet')
            ->layout('layouts.base');
    }
}
