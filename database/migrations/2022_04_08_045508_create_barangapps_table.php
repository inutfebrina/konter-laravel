<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangapps', function (Blueprint $table) {
            
            $table->increments('id_barang');
            $table->string('id_data');
            $table->string('id');
            $table->string('nm_barang');
            $table->integer('harga_bl');
            $table->integer('harga_jl');
            $table->integer('stok');
            $table->enum('unit',['PCS','Pack']);
            // $table->integer('terjual');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangapps');
    }
}
