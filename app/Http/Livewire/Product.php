<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class Product extends Component
{
    public $product;
    public $data;
    public $trending, $apparel, $sneakers, $special1, $special2;

    public function mount()
    {
        $this->trending = Item::where('category', 'trending')->get();
        $this->apparel =  Item::where('category', 'apparel')->get();
        $this->special1 = Item::where('category', 'special1')->get();
        $this->special2 = Item::where('category', 'special2')->get();
        $this->sneakers =  Item::where('category', 'sneakers')->get();

        $this->data = [
            'trending' => $this->trending,
            'apparel' => $this->apparel,
            'special1' => $this->special1,
            'special2' => $this->special2,
            'sneakers' => $this->sneakers,
        ];
    }
    public function beli($id)
    {
        if (!Auth::user()) {
            return Redirect()->route('login');
        }
        //mencari produk
        $product = Item::find($id);

        Order::create(
            [
                'user_id' => Auth::user()->id,
                'total_harga' => $product->harga,
                'produk_id' => $product->id,
                'namaproduk' => $product->namaproduk,
                'status' => 0
            ]
        );
        return redirect()->to('cart');
    }

    public function render()
    {
        return view('livewire.product', $this->data)
            ->extends('layouts.product-layouts')->section('product');
    }
}
