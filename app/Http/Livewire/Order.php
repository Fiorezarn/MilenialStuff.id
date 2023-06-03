<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Trending;
use App\Models\Apparel;
use App\Models\Sneaker;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;


class Order extends Component
{
    public function render()
    {
        $this->product = Item::all();
        return view('livewire.order')
            ->extends('layouts.main')->section('content');
    }
}
