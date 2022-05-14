<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->string('no_anggota')->unique;
            $table->string('name');
            $table->date('tgl_lahir');
            $table->enum('jk', ['P', 'L'])->nullable();
            $table->enum('agama', ['Katolik', 'Protestan','Islam','Hindu','Buddha','Khonghucu'])->nullable();
            $table->string('no_hp');
            $table->string('image')->nullable();
            $table->text('alamat');
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
        Schema::dropIfExists('anggota');
    }
}
