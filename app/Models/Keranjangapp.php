<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjangapp extends Model
{
    use HasFactory;
    protected $table="keranjangapps";
    protected $filetable=['id_barang','terjual','ket','total'];
}
