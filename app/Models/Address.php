<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Address extends Model
{
    use HasFactory;
    protected $table = "alamats";
    protected $fillable = ['namapenerima', 'phone', 'alamat', 'namaproduk', 'totalharga'];

    public function deleteData($id)
    {
        return DB::table('alamats')->where('id', $id)->delete();
    }
}
