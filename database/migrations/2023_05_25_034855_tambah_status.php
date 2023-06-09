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
        Schema::table('jenis_surat', function ($table) {
            $table->integer('status')->after('keterangan')->default(1);
        });

        Schema::table('syarat_pengajuan_surat', function ($table) {
            $table->integer('status')->after('keterangan')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jenis_surat', function ($table) {
            $table->dropColumn('status');
        });

        Schema::table('syarat_pengajuan_surat', function ($table) {
            $table->dropColumn('status');
        });
    }
};
