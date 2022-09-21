<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahKolomStatusPasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pasiens', function (Blueprint $table) {
            $table->enum('status', ['pending', 'treated', 'done'])->after('keluhan')->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pasiens', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
