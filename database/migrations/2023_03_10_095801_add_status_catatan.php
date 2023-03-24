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
        Schema::table('pengajuan_surat', function ($table) {
            $table->string('tindakan')->after('berkas')->nullable();
            $table->string('catatan')->after('berkas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengajuan_surat', function ($table) {
            $table->dropColumn('tindakan');
            $table->dropColumn('catatan');
        });
    }
};
