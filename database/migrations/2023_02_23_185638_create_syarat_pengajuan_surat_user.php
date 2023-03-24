<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syarat_pengajuan_surat_user', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_pengajuan_surat');
            $table->integer('id_syarat');
            $table->string('berkas');
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
        Schema::dropIfExists('syarat_pengajuan_surat_user');
    }
};
