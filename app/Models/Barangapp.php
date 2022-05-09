<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangapp extends Model
{
    use HasFactory;
    protected $table="barangapps";
    protected $filetable=['id_data','id','nm_barang','harga_bl','harga_jl','stok','unit'];
}
