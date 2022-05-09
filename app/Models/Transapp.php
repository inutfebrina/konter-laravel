<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transapp extends Model
{
    use HasFactory;
    protected $table="transapps";
    protected $filetable=['tgl','id_barang','terjual','ket','total'];
}
