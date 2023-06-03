<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;
use App\Models\Address;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->Item = new Item();
    }
    public function index()
    {
        $data = [
            'product' => $this->Item->where('category', 'sneakers')->get(),
            'totalproduct' => $this->Item->where('category', 'sneakers')->count(),
        ];
        return view('adminlte.v_dataitem', $data);
    }
    public function detail($id)
    {
        if (!$this->Item->detailData($id)) {
            abort(404);
        }
        $data = [
            'product'=> $this->Item->detailData($id),
        ];
        return view('adminlte.v_detailitem', $data);
    }

    public function add()
    {
        return view ('adminlte.v_additem');
    }
    public function insert()
    {
        Request()->validate([
            'id' => 'required|unique:tbl_produk,id|min:1|max:6',
            'no_produk' => 'required|unique:tbl_produk,id|min:1|max:6',
            'namaproduk' => 'required|max:100',
            'size' => 'required',
            'stock' => 'required|integer',
            'harga' => 'required|integer',
            'category' => 'required|max:25',
            'photo' => 'required|mimes:jpg,jpeg,png,webp|max:100',
        ],[
            'id.required' => 'wajib diisi !!',
            'id.unique' => 'id Sudah Ada !!',
            'id.min' => 'Min 1 Karakter',
            'id.max' => 'Max 6 Karakter'
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        //upload photo
        $file = Request()-> photo;
        $fileName = Request()->namaproduk.'.'.$file->extension();
        $file->move(public_path('foto_produk'), $fileName);

        $data = [
            'id' => Request()->id,
            'no_produk' => Request()->no_produk,
            'namaproduk' => Request()->namaproduk,
            'size' => Request()->size,
            'stock' => Request()->stock,
            'harga' => Request()->harga,
            'category' => Request()->category,
            'photo' => $fileName,
        ];

        $this->Item->addData($data);
        return redirect()->route('dataitem')->with('pesan','Data Berhasil Di Tambahkan !!');
    }
    public function edit($id)
    {
        if (!$this->Item->detailData($id)) {
            abort(404);
        }
        $data = [
            'product'=> $this->Item->detailData($id),
        ];
        return view ('adminlte.v_edititem', $data);
    }
    public function update($id)
    {
        Request()->validate([
            'id' => 'required|min:1|max:6',
            'no_produk' => 'required|unique:tbl_produk,id|min:1|max:6',
            'namaproduk' => 'required|max:100',
            'size' => 'required',
            'stock' => 'required|integer',
            'harga' => 'required|integer',
            'category' => 'required|max:25',
            'photo' => 'mimes:jpg,jpeg,png,webp|max:100',
        ],[
            'id.required' => 'wajib diisi !!',
            'id.unique' => 'id Sudah Ada !!',
            'id.min' => 'Min 1 Karakter',
            'id.max' => 'Max 6 Karakter'
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->photo <> "") {
        //jika ingin ganti foto
        //upload photo
        $file = Request()-> photo;
        $fileName = Request()->namaproduk.'.'.$file->extension();
        $file->move(public_path('foto_produk'), $fileName);

        $data = [
            'id' => Request()->id,
            'no_produk' => Request()->no_produk,
            'namaproduk' => Request()->namaproduk,
            'size' => Request()->size,
            'stock' => Request()->stock,
            'harga' => Request()->harga,
            'category' => Request()->category,
            'photo' => $fileName,
        ];

        $this->Item->editData($id, $data);
        }else {
            //jika tidak ingin ganti foto
            $data = [
                'id' => Request()->id,
                'no_produk' => Request()->no_produk,
                'namaproduk' => Request()->namaproduk,
                'size' => Request()->size,
                'stock' => Request()->stock,
                'harga' => Request()->harga,
                'category' => Request()->category,
            ];
            $this->Item->editData($id, $data);
        }
        return redirect()->route('dataitem')->with('pesan','Data Berhasil Di Update !!');
    }
    public function delete($id)
    {
        //hapus foto
        $product = $this->Item->detailData($id);
        if ($product->photo <> "") {
            unlink(public_path('foto_produk') . '/' . $product->photo);
        }   
        $this->Item->deleteData($id);
        return redirect()->route('dataitem')->with('pesan','Data Berhasil Di Hapus !!');
    }
    ///////////////////////////////////////////Trending/////////////////////////////////////////////////////
    public function trending()
    {
        $data = [
        'trending' => $this->Item->where('category', 'trending')->get(),
        'totaltrending'=> $this->Item->where('category', 'trending')->count(),
        ];
        return view('adminlte.v_datatrending', $data);
    }
    public function detailtrending($id)
    {
        if (!$this->Item->detailData($id)) {
            abort(404);
        }
        $data = [
            'trending'=> $this->Item->detailData($id),
        ];
        return view('adminlte.v_detailtrending', $data);
    }

    public function addtrending()
    {
        return view ('adminlte.v_addtrending');
    }
    public function inserttrending()
    {
        Request()->validate([
            'id' => 'required|unique:tbl_produk,id|min:1|max:6',
            'no_produk' => 'required|unique:tbl_produk,id|min:1|max:6',
            'namaproduk' => 'required|max:100',
            'size' => 'required',
            'stock' => 'required|integer',
            'harga' => 'required|integer',
            'category' => 'required|max:25',
            'photo' => 'required|mimes:jpg,jpeg,png,webp|max:100',
        ],[
            'id.required' => 'wajib diisi !!',
            'id.unique' => 'id Sudah Ada !!',
            'id.min' => 'Min 1 Karakter',
            'id.max' => 'Max 6 Karakter'
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        //upload photo
        $file = Request()-> photo;
        $fileName = Request()->namaproduk.'.'.$file->extension();
        $file->move(public_path('foto_produk'), $fileName);

        $data = [
            'id' => Request()->id,
            'no_produk' => Request()->no_produk,
            'namaproduk' => Request()->namaproduk,
            'size' => Request()->size,
            'stock' => Request()->stock,
            'harga' => Request()->harga,
            'category' => Request()->category,
            'photo' => $fileName,
        ];

        $this->Item->addData($data);
        return redirect()->route('datatrending')->with('pesan','Data Berhasil Di Tambahkan !!');
    }
    public function edittrending($id)
    {
        if (!$this->Item->detailData($id)) {
            abort(404);
        }
        $data = [
            'trending'=> $this->Item->detailData($id),
        ];
        return view ('adminlte.v_edittrending', $data);
    }
    public function updatetrending($id)
    {
        Request()->validate([
            'id' => 'required|min:1|max:6',
            'no_produk' => 'required|unique:tbl_produk,id|min:1|max:6',
            'namaproduk' => 'required|max:100',
            'size' => 'required',
            'stock' => 'required|integer',
            'harga' => 'required|integer',
            'category' => 'required|max:25',
            'photo' => 'mimes:jpg,jpeg,png,webp|max:100',
        ],[
            'id.required' => 'wajib diisi !!',
            'id.unique' => 'id Sudah Ada !!',
            'id.min' => 'Min 1 Karakter',
            'id.max' => 'Max 6 Karakter'
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->photo <> "") {
        //jika ingin ganti foto
        //upload photo
        $file = Request()-> photo;
        $fileName = Request()->namaproduk.'.'.$file->extension();
        $file->move(public_path('foto_produk'), $fileName);

        $data = [
            'id' => Request()->id,
            'no_produk' => Request()->no_produk,
            'namaproduk' => Request()->namaproduk,
            'size' => Request()->size,
            'stock' => Request()->stock,
            'harga' => Request()->harga,
            'category' => Request()->category,
            'photo' => $fileName,
        ];

        $this->Item->editData($id, $data);
        }else {
            //jika tidak ingin ganti foto
            $data = [
                'id' => Request()->id,
                'no_produk' => Request()->no_produk,
                'namaproduk' => Request()->namaproduk,
                'size' => Request()->size,
                'stock' => Request()->stock,
                'harga' => Request()->harga,
                'category' => Request()->category,
            ];
            $this->Item->editData($id, $data);
        }
        return redirect()->route('datatrending')->with('pesan','Data Berhasil Di Update !!');
    }
    public function deletetrending($id)
    {
        //hapus foto
        $product = $this->Item->detailData($id);
        if ($product->photo <> "") {
            unlink(public_path('foto_produk') . '/' . $product->photo);
        }   
        $this->Item->deleteData($id);
        return redirect()->route('datatrending')->with('pesan','Data Berhasil Di Hapus !!');
    }

    ///////////////////////////////////////////Apparel/////////////////////////////////////////////////////
    public function apparel()
    {
        $data = [
        'apparel' => $this->Item->where('category', 'apparel')->get(),
        'totalapparel' => $this->Item->where('category', 'apparel')->count(),
        ];
        return view('adminlte.v_dataapparel', $data);
    }
    public function detailapparel($id)
    {
        if (!$this->Item->detailData($id)) {
            abort(404);
        }
        $data = [
            'apparel'=> $this->Item->detailData($id),
        ];
        return view('adminlte.v_detailapparel', $data);
    }

    public function addapparel()
    {
        return view ('adminlte.v_addapparel');
    }
    public function insertapparel()
    {
        Request()->validate([
            'id' => 'required|unique:tbl_produk,id|min:1|max:6',
            'no_produk' => 'required|unique:tbl_produk,id|min:1|max:6',
            'namaproduk' => 'required|max:100',
            'size' => 'required',
            'stock' => 'required|integer',
            'harga' => 'required|integer',
            'category' => 'required|max:25',
            'photo' => 'required|mimes:jpg,jpeg,png,webp|max:100',
        ],[
            'id.required' => 'wajib diisi !!',
            'id.unique' => 'id Sudah Ada !!',
            'id.min' => 'Min 1 Karakter',
            'id.max' => 'Max 6 Karakter'
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        //upload photo
        $file = Request()-> photo;
        $fileName = Request()->namaproduk.'.'.$file->extension();
        $file->move(public_path('foto_produk'), $fileName);

        $data = [
            'id' => Request()->id,
            'no_produk' => Request()->no_produk,
            'namaproduk' => Request()->namaproduk,
            'size' => Request()->size,
            'stock' => Request()->stock,
            'harga' => Request()->harga,
            'category' => Request()->category,
            'photo' => $fileName,
        ];

        $this->Item->addData($data);
        return redirect()->route('dataapparel')->with('pesan','Data Berhasil Di Tambahkan !!');
    }
    public function editapparel($id)
    {
        if (!$this->Item->detailData($id)) {
            abort(404);
        }
        $data = [
            'apparel'=> $this->Item->detailData($id),
        ];
        return view ('adminlte.v_editapparel', $data);
    }
    public function updateapparel($id)
    {
        Request()->validate([
            'id' => 'required|min:1|max:6',
            'no_produk' => 'required|unique:tbl_produk,id|min:1|max:6',
            'namaproduk' => 'required|max:100',
            'size' => 'required',
            'stock' => 'required|integer',
            'harga' => 'required|integer',
            'category' => 'required|max:25',
            'photo' => 'mimes:jpg,jpeg,png,webp|max:100',
        ],[
            'id.required' => 'wajib diisi !!',
            'id.unique' => 'id Sudah Ada !!',
            'id.min' => 'Min 1 Karakter',
            'id.max' => 'Max 6 Karakter'
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->photo <> "") {
        //jika ingin ganti foto
        //upload photo
        $file = Request()-> photo;
        $fileName = Request()->namaproduk.'.'.$file->extension();
        $file->move(public_path('foto_produk'), $fileName);

        $data = [
            'id' => Request()->id,
            'no_produk' => Request()->no_produk,
            'namaproduk' => Request()->namaproduk,
            'size' => Request()->size,
            'stock' => Request()->stock,
            'harga' => Request()->harga,
            'category' => Request()->category,
            'photo' => $fileName,
        ];

        $this->Item->editData($id, $data);
        }else {
            //jika tidak ingin ganti foto
            $data = [
                'id' => Request()->id,
                'no_produk' => Request()->no_produk,
                'namaproduk' => Request()->namaproduk,
                'size' => Request()->size,
                'stock' => Request()->stock,
                'harga' => Request()->harga,
                'category' => Request()->category,
            ];
            $this->Item->editData($id, $data);
        }
        return redirect()->route('dataapparel')->with('pesan','Data Berhasil Di Update !!');
    }
    public function deleteapparel($id)
    {
        //hapus foto
        $product = $this->Item->detailData($id);
        if ($product->photo <> "") {
            unlink(public_path('foto_produk') . '/' . $product->photo);
        }   
        $this->Item->deleteData($id);
        return redirect()->route('dataapparel')->with('pesan','Data Berhasil Di Hapus !!');
    }

    ///////////////////////////////////////////Special 1/////////////////////////////////////////////////////
    public function special1()
    {
        $data = [
        'special1' => $this->Item->where('category', 'special1')->get(),
        'totalspecial1' => $this->Item->where('category', 'special1')->count(),
        ];
        return view('adminlte.v_dataspecial1', $data);
    }
    public function detailspecial1($id)
    {
        if (!$this->Item->detailData($id)) {
            abort(404);
        }
        $data = [
            'special1'=> $this->Item->detailData($id),
        ];
        return view('adminlte.v_detailspecial1', $data);
    }

    public function addspecial1()
    {
        return view ('adminlte.v_addspecial1');
    }
    public function insertspecial1()
    {
        Request()->validate([
            'id' => 'required|unique:tbl_produk,id|min:1|max:6',
            'no_produk' => 'required|unique:tbl_produk,id|min:1|max:6',
            'namaproduk' => 'required|max:100',
            'size' => 'required',
            'stock' => 'required|integer',
            'harga' => 'required|integer',
            'category' => 'required|max:25',
            'photo' => 'required|mimes:jpg,jpeg,png,webp|max:100',
        ],[
            'id.required' => 'wajib diisi !!',
            'id.unique' => 'id Sudah Ada !!',
            'id.min' => 'Min 1 Karakter',
            'id.max' => 'Max 6 Karakter'
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        //upload photo
        $file = Request()-> photo;
        $fileName = Request()->namaproduk.'.'.$file->extension();
        $file->move(public_path('foto_produk'), $fileName);

        $data = [
            'id' => Request()->id,
            'no_produk' => Request()->no_produk,
            'namaproduk' => Request()->namaproduk,
            'size' => Request()->size,
            'stock' => Request()->stock,
            'harga' => Request()->harga,
            'category' => Request()->category,
            'photo' => $fileName,
        ];

        $this->Item->addData($data);
        return redirect()->route('dataspecial1')->with('pesan','Data Berhasil Di Tambahkan !!');
    }
    public function editspecial1($id)
    {
        if (!$this->Item->detailData($id)) {
            abort(404);
        }
        $data = [
            'special1'=> $this->Item->detailData($id),
        ];
        return view ('adminlte.v_editspecial1', $data);
    }
    public function updatespecial1($id)
    {
        Request()->validate([
            'id' => 'required|min:1|max:6',
            'no_produk' => 'required|unique:tbl_produk,id|min:1|max:6',
            'namaproduk' => 'required|max:100',
            'size' => 'required',
            'stock' => 'required|integer',
            'harga' => 'required|integer',
            'category' => 'required|max:25',
            'photo' => 'mimes:jpg,jpeg,png,webp|max:100',
        ],[
            'id.required' => 'wajib diisi !!',
            'id.unique' => 'id Sudah Ada !!',
            'id.min' => 'Min 1 Karakter',
            'id.max' => 'Max 6 Karakter'
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->photo <> "") {
        //jika ingin ganti foto
        //upload photo
        $file = Request()-> photo;
        $fileName = Request()->namaproduk.'.'.$file->extension();
        $file->move(public_path('foto_produk'), $fileName);

        $data = [
            'id' => Request()->id,
            'no_produk' => Request()->no_produk,
            'namaproduk' => Request()->namaproduk,
            'size' => Request()->size,
            'stock' => Request()->stock,
            'harga' => Request()->harga,
            'category' => Request()->category,
            'photo' => $fileName,
        ];

        $this->Item->editData($id, $data);
        }else {
            //jika tidak ingin ganti foto
            $data = [
                'id' => Request()->id,
                'no_produk' => Request()->no_produk,
                'namaproduk' => Request()->namaproduk,
                'size' => Request()->size,
                'stock' => Request()->stock,
                'harga' => Request()->harga,
                'category' => Request()->category,
            ];
            $this->Item->editData($id, $data);
        }
        return redirect()->route('dataspecial1')->with('pesan','Data Berhasil Di Update !!');
    }
    public function deletespecial1($id)
    {
        //hapus foto
        $product = $this->Item->detailData($id);
        if ($product->photo <> "") {
            unlink(public_path('foto_produk') . '/' . $product->photo);
        }   
        $this->Item->deleteData($id);
        return redirect()->route('dataspecial1')->with('pesan','Data Berhasil Di Hapus !!');
    }

     ///////////////////////////////////////////Special 2/////////////////////////////////////////////////////
     public function special2()
     {
         $data = [
         'special2' => $this->Item->where('category', 'special2')->get(),
         'totalspecial2' => $this->Item->where('category', 'special2')->count(),
         ];
         return view('adminlte.v_dataspecial2', $data);
     }
     public function detailspecial2($id)
     {
         if (!$this->Item->detailData($id)) {
             abort(404);
         }
         $data = [
             'special2'=> $this->Item->detailData($id),
         ];
         return view('adminlte.v_detailspecial2', $data);
     }
 
     public function addspecial2()
     {
         return view ('adminlte.v_addspecial2');
     }
     public function insertspecial2()
     {
         Request()->validate([
             'id' => 'required|unique:tbl_produk,id|min:1|max:6',
             'no_produk' => 'required|unique:tbl_produk,id|min:1|max:6',
             'namaproduk' => 'required|max:100',
             'size' => 'required',
             'stock' => 'required|integer',
             'harga' => 'required|integer',
             'category' => 'required|max:25',
             'photo' => 'required|mimes:jpg,jpeg,png,webp|max:100',
         ],[
             'id.required' => 'wajib diisi !!',
             'id.unique' => 'id Sudah Ada !!',
             'id.min' => 'Min 1 Karakter',
             'id.max' => 'Max 6 Karakter'
         ]);
 
         //jika validasi tidak ada maka lakukan simpan data
         //upload photo
         $file = Request()-> photo;
         $fileName = Request()->namaproduk.'.'.$file->extension();
         $file->move(public_path('foto_produk'), $fileName);
 
         $data = [
             'id' => Request()->id,
             'no_produk' => Request()->no_produk,
             'namaproduk' => Request()->namaproduk,
             'size' => Request()->size,
             'stock' => Request()->stock,
             'harga' => Request()->harga,
             'category' => Request()->category,
             'photo' => $fileName,
         ];
 
         $this->Item->addData($data);
         return redirect()->route('dataspecial2')->with('pesan','Data Berhasil Di Tambahkan !!');
     }
     public function editspecial2($id)
     {
         if (!$this->Item->detailData($id)) {
             abort(404);
         }
         $data = [
             'special2'=> $this->Item->detailData($id),
         ];
         return view ('adminlte.v_editspecial2', $data);
     }
     public function updatespecial2($id)
     {
         Request()->validate([
             'id' => 'required|min:1|max:6',
             'no_produk' => 'required|unique:tbl_produk,id|min:1|max:6',
             'namaproduk' => 'required|max:100',
             'size' => 'required',
             'stock' => 'required|integer',
             'harga' => 'required|integer',
             'category' => 'required|max:25',
             'photo' => 'mimes:jpg,jpeg,png,webp|max:100',
         ],[
             'id.required' => 'wajib diisi !!',
             'id.unique' => 'id Sudah Ada !!',
             'id.min' => 'Min 1 Karakter',
             'id.max' => 'Max 6 Karakter'
         ]);
 
         //jika validasi tidak ada maka lakukan simpan data
         if (Request()->photo <> "") {
         //jika ingin ganti foto
         //upload photo
         $file = Request()-> photo;
         $fileName = Request()->namaproduk.'.'.$file->extension();
         $file->move(public_path('foto_produk'), $fileName);
 
         $data = [
             'id' => Request()->id,
             'no_produk' => Request()->no_produk,
             'namaproduk' => Request()->namaproduk,
             'size' => Request()->size,
             'stock' => Request()->stock,
             'harga' => Request()->harga,
             'category' => Request()->category,
             'photo' => $fileName,
         ];
 
         $this->Item->editData($id, $data);
         }else {
             //jika tidak ingin ganti foto
             $data = [
                 'id' => Request()->id,
                 'no_produk' => Request()->no_produk,
                 'namaproduk' => Request()->namaproduk,
                 'size' => Request()->size,
                 'stock' => Request()->stock,
                 'harga' => Request()->harga,
                 'category' => Request()->category,
             ];
             $this->Item->editData($id, $data);
         }
         return redirect()->route('dataspecial2')->with('pesan','Data Berhasil Di Update !!');
     }
     public function deletespecial2($id)
     {
         //hapus foto
         $product = $this->Item->detailData($id);
         if ($product->photo <> "") {
             unlink(public_path('foto_produk') . '/' . $product->photo);
         }   
         $this->Item->deleteData($id);
         return redirect()->route('dataspecial2')->with('pesan','Data Berhasil Di Hapus !!');
     }
}


