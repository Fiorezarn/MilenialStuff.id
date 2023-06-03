<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Kavist\RajaOngkir\RajaOngkir;

class TambahOngkir extends Component
{
    public $belanja;
    private $apiKey = 'adc2edb5d767e2b6bc337f05997d4747';
    public $provinsi_id, $kota_id, $jasa, $daftarProvinsi, $daftarKota, $nama_jasa;
    public $result = [];
    public function mount($id)
    {
        if(!Auth::user())
        {
            return redirect()->route('login');
        }
        $this->belanja = Order::find($id);

        if($this->belanja->user_id != Auth::user()->id)
        {
            return redirect()->to('');
        }
    }

    public function getOngkir()
    {
        //validasi
        if(!$this->provinsi_id || !$this->kota_id || !$this->jasa)
        {
            return;
        }

        //mengambil data produk
        $produk = Item::find($this->belanja->produk_id);

        //mengambil biaya ongkir
        $rajaOngkir = new RajaOngkir($this->apiKey);
        $cost       = $rajaOngkir->ongkosKirim([
            'origin'        => 489, //inikota tuban jd harus diganti jakarta
            'destination'   => $this->kota_id,
            'weight'        => 1300,
            'courier'       => $this->jasa
        ])->get();


        $this->nama_jasa = $cost[0]['name'];


        foreach ($cost[0]['costs'] as $row)
        {
            $this->result[] = array(
                'description'   => $row['description'],
                'biaya'         => $row['cost'][0]['value'],
                'etd'           => $row['cost'][0]['etd']
            );
        }
        $this->render();
        //dd($this->result);
    }

    public function save_ongkir($biaya_pengiriman)
    {
        $this->belanja->total_harga += $biaya_pengiriman;
        $this->belanja->status = 1;
        $this->belanja->update();

        //redirect ke belanja
        return redirect()->to('cart');
    }

    public function render()
    {
        $rajaOngkir = new RajaOngkir($this->apiKey);
        $this->daftarProvinsi = $rajaOngkir->provinsi()->all();

        if($this->provinsi_id)
        {
            $this->daftarKota = $rajaOngkir->kota()->dariProvinsi($this->provinsi_id)->get();
        }

        return view('livewire.tambah-ongkir')
            ->extends('layouts.product-layouts')
            ->section('product');
    }
}
