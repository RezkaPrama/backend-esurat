<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('no_surat');
            $table->string('jenis_surat');
            $table->date('tanggal_penerimaan');
            $table->bigInteger('no_agenda');
            $table->date('tanggal_surat');
            $table->string('asal_surat');
            $table->string('tujuan_surat');
            $table->string('perihal');
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
        Schema::dropIfExists('surat_masuks');
    }
}
