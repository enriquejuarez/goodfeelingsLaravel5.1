<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file', 150);
            $table->string('title', 200);
            $table->enum('status', ['on', 'off'])->default('on');
            $table->timestamps();
        });

        $date = Carbon::now();
        DB::table('destinations')->insert(array('file'=>'http://goodfeelings.test/imagenes/destino1.jpg', 'title'=>'HOTEL OCEAN COBAL & TURQUESA RIVERA MAYA. TODO INCLUIDO', 'created_at' => $date, 'updated_at' => $date));
        DB::table('destinations')->insert(array('file'=>'http://goodfeelings.test/imagenes/destino2.jpg', 'title'=>'PARQUE ACUÁTICO XCARET, XEL-HA Y XENSES', 'created_at' => $date, 'updated_at' => $date));
        DB::table('destinations')->insert(array('file'=>'http://goodfeelings.test/imagenes/destino3.jpg', 'title'=>'PASEO EN YATE, TULÚM Y 5A. AVENIDA', 'created_at' => $date, 'updated_at' => $date));
        DB::table('destinations')->insert(array('file'=>'http://goodfeelings.test/imagenes/destino4.jpg', 'title'=>'SHOW CIRQUE DU SOLEIL', 'created_at' => $date, 'updated_at' => $date));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destinations');
    }
}
