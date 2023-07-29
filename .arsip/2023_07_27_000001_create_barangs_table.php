<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = 'barangs';
        try {
            if (!Schema::hasTable($tableName)) {
                Schema::create($tableName, function (Blueprint $table) {
                    $table->text('id')->primary();
                    $table->text('nama')->notNullable();
                    $table->integer('harga')->notNullable()->check('harga > 0');
                    $table->integer('stok')->notNullable()->check('stok >= 0');
                    $table->text('kode')->unique()->notNullable();
                    $table->text('perusahaan_id')->notNullable();
                    $table->foreign('perusahaan_id')->references('id')->on('perusahaans')->onDelete('cascade');
                    // $table->timestamps();
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
        Schema::dropIfExists('barangs');
    }
}