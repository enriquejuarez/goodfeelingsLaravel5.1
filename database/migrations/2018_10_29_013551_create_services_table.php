<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file', 150);
            $table->string('title', 200);
            $table->enum('status', ['on', 'off'])->default('on');
            $table->timestamps();
        });

        $date = Carbon::now();
        DB::table('services')->insert(array('file'=>'http://goodfeelings.test/imagenes/Servicios1.jpg', 'title'=>'VIAJES DE GRADUACIÓN', 'created_at' => $date, 'updated_at' => $date));
        DB::table('services')->insert(array('file'=>'http://goodfeelings.test/imagenes/Servicios2.jpg', 'title'=>'DESPEDIDA DE SOLTERO(A)', 'created_at' => $date, 'updated_at' => $date));
        DB::table('services')->insert(array('file'=>'http://goodfeelings.test/imagenes/Servicios3.jpg', 'title'=>'VIAJES ESCOLARES', 'created_at' => $date, 'updated_at' => $date));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
