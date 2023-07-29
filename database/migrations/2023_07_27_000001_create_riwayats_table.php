<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = 'riwayats';
        try {
            if (!Schema::hasTable($tableName)) {
                Schema::create($tableName, function (Blueprint $table) {
                    $table->text('id')->primary();
                    $table->text('user_id')->notNullable();
                    // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                    $table->text('barang_id')->notNullable();
                    $table->text('nama_barang')->notNullable();
                    // $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
                    $table->integer('jumlah_barang')->notNullable();
                    $table->integer('total_harga')->notNullable();
                    $table->timestamps();
                });
            }
        } catch (Throwable $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayats');
    }
}