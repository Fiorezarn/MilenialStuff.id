<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{
    public $product = [];
    public function mount()
    {
        if(!Auth::user())
        {
            return redirect()->route('login'); 
        }
    }
    public function destroy ($pesanan_id)
    {
        $pesanan = \App\Models\Order::find($pesanan_id);
        $pesanan ->delete();
    }
    
    public function render()
    {
        if(Auth::user())
        {
            $this->product = Order::where('user_id', Auth::user()->id)->get();
        }
        return view('livewire.cart')
        ->extends('layouts.product-layouts')->section('product');;
    }
}
