<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\Alamat;
use Illuminate\Support\Facades\Auth;

class Bayar extends Component
{
    public $snapToken;
    public $belanja;
    public $va_number, $gross_amount, $bank, $transaction_status, $deadline;
    public $namapenerima, $email, $phone, $alamat, $user, $harga, $namaproduk;

    public function mount($id)
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-d8dGSfkiYcOsQ5Kqs8NCTNrs';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        if (isset($_GET['result_data'])) {

            $current_status         = json_decode($_GET['result_data'], true);
            $order_id               = $current_status['order_id'];
            $this->belanja          = Order::where('id', $order_id)->first();
            $this->belanja->status  = 2;
            $this->belanja->update();
        } else {
            //ambil data belanja
            $this->belanja = Order::find($id);
        }

        if (!empty($this->belanja)) {
            if ($this->belanja->status == 1) {
                $params = array(
                    'transaction_details' => array(
                        'order_id' => $this->belanja->id,
                        'gross_amount' => $this->belanja->total_harga,
                    ),
                    'customer_details' => array(
                        'first_name' => 'Tuan',
                        'last_name' => Auth::user()->name,
                        'email' => Auth::user()->email,
                        'phone' => Auth::user()->phonenumber,
                    ),
                );

                $this->snapToken = \Midtrans\Snap::getSnapToken($params);
            } else if ($this->belanja->status == 2) {
                $status = \Midtrans\Transaction::status($this->belanja->id);
                $status = json_decode(json_encode($status), true);
                //menampilkan status pembayaran
                $this->gross_amount         = $status['gross_amount'];
                $this->payment_type         = $status['payment_type'];
                $this->transaction_status   = $status['transaction_status'];
                $transaction_time           = $status['transaction_time'];
                $this->deadline             = date('Y-m-d H:i:s', strtotime('+1 day', strtotime($transaction_time)));
            }
            $this->totalharga = $this->belanja->total_harga;
            $this->namaproduk = $this->belanja->namaproduk;
        }
    }
    
    public function render()
    {
        return view('livewire.bayar')
            ->extends('layouts.product-layouts')->section('product');
    }
}