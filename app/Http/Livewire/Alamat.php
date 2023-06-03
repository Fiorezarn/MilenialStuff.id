<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class Alamat extends Component
{
    public $product = [];
    public $namapenerima, $phone, $alamat, $user, $totalharga, $namaproduk;

    public function mount($id)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        $this->totalharga = Order::find($id)->total_harga;
        $this->namaproduk = Order::find($id)->namaproduk;
        $this->user = $user;
        $this->namapenerima = $user->name;
        $this->phone = $user->phonenumber;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'namapenerima' => 'required|string',
            'phone' => 'required|string',
            'alamat' => 'required|string',
            'namaproduk' => 'required|string',
            'totalharga' => 'required|integer',
        ]);
    
        Address::create([
            'namapenerima' => $this->namapenerima,
            'phone' => $this->phone,
            'alamat' => $this->alamat,
            'namaproduk' => $this->namaproduk,
            'totalharga' => $this->totalharga,
        ]);
    
        session()->flash('message', 'Alamat berhasil ditambahkan.');
        $this->resetInputFields();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'title' => 'Success',
            'text' => 'Alamat berhasil ditambahkan.',
        ]);
    }

    private function resetInputFields()
    {
        $this->namapenerima = '';
        $this->phone = '';
        $this->alamat = '';
    }

    public function render()
    {
        if(Auth::user())
        {
            $this->product = Order::where('user_id', Auth::user()->id)->get();
        }
        return view('livewire.alamat')
        ->extends('layouts.product-layouts')
        ->section('product');
    }
}