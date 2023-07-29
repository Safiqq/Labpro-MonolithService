<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = 'users';
        try {
            if (!Schema::hasTable($tableName)) {
                Schema::create($tableName, function (Blueprint $table) {
                    $table->text('id')->primary();
                    $table->text('nama')->notNullable();
                    $table->text('username');
                    $table->text('email');
                    $table->text('password')->notNullable();
                    $table->text('tipe')->default('user');
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
        Schema::dropIfExists('users');
    }
}