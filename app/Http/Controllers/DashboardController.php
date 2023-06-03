<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\Order;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->Address = new Address();
    }

    public function index()
    {
        $alamat = Address::all();
        $totalorder = Order::where('status','2')->count();
        $userCount = User::where('level','2')->count();
        $admin = User::where('level','1')->count();
        $totalproduct = Item::count();

        $user = Auth::user();
        return view('adminlte/v_template', [
            'alamat' => $alamat,
            'userCount' => $userCount,
            'totalproduct' => $totalproduct,
            'totalorder' => $totalorder,
            'admin' => $admin,
            'user' => $user,
        ]);
    }

    public function delete($id)
    { 
        $this->Address->deleteData($id);
        return redirect()->route('dashboard')->with('pesan','Data Berhasil Di Hapus !!');
    }
}
