<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePrendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prendas', function (Blueprint $table) {
            $table->integer('cantidad_prenda');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prendas', function (Blueprint $table) {
            Schema::table('prendas', function (Blueprint $table) {
                if (Schema::hasColumn('prendas', 'cantidad_prenda')) {
                     $table->dropColumn('cantidad_prenda');
                } 
             });
        });
    }
}
