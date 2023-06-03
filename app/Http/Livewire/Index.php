<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $data;
    public $product;
    public $special1, $special2;

    public function mount()
    {
        $this->special1 = Item::where('category', 'special1')->get();
        $this->special2 = Item::where('category', 'special2')->get();

        $this->data = [
            'special1' => $this->special1,
            'special2' => $this->special2,
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
        return view('livewire.index', $this->data)
            ->extends('layouts.main')
            ->section('container');
    }
}
