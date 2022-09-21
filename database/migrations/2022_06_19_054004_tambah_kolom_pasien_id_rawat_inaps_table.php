<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahKolomPasienIdRawatInapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rawat_inaps', function (Blueprint $table) {
            $table->foreignId('pasien_id')->after('ruang_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rawat_inaps', function (Blueprint $table) {
            $table->dropColumn('pasien_id');
        });
    }
}
