<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trending;
use App\Models\Apparel;
use App\Models\Sneaker;
use App\Models\Item;

class ProductController extends Controller
{
    public function index()
    {
        $trends = Trending::all();
        $apparel = Apparel::all();
        $sneaker = Sneaker::all();
        $product = Item::where('category', 'sneakers')->get();

        $data = [
            'trends' => $trends,
            'apparel' => $apparel,
            'sneaker' => $sneaker,
            'product' => $product,
        ];

        return view('product', $data);
    }
}

