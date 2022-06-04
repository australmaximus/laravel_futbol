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
        Schema::table('jugadores', function(Blueprint $table){
            $table->string('rut',10)->after('id'); // después de la columna id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jugadores', function(Blueprint $table){
            $table->dropColumn('rut');
        });
    }
};
