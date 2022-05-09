<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataapp extends Model
{
    use HasFactory;
    protected $table="dataapps";
    protected $filetable=['nama'];
}
