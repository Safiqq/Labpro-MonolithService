<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerusahaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = 'perusahaans';
        try {
            if (!Schema::hasTable($tableName)) {
                Schema::create($tableName, function (Blueprint $table) {
                    $table->text('id')->primary();
                    $table->text('nama')->notNullable();
                    $table->text('alamat')->notNullable();
                    $table->text('no_telp')->notNullable();
                    $table->text('kode')->notNullable();
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
        Schema::dropIfExists('perusahaans');
    }
}