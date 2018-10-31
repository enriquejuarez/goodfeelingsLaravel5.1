<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file', 150);
            $table->string('reference', 80);
            $table->enum('status', ['on', 'off'])->default('on');
            $table->timestamps();
        });

        $date = Carbon::now();
        DB::table('galleries')->insert(array('file'=>'http://goodfeelings.test/imagenes/Portada1.jpg', 'reference'=>'encabezado', 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
        DB::table('galleries')->insert(array('file'=>'http://goodfeelings.test/imagenes/Portada2.jpg', 'reference'=>'encabezado', 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
        DB::table('galleries')->insert(array('file'=>'http://goodfeelings.test/imagenes/Portada3.jpg', 'reference'=>'encabezado', 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galleries');
    }
}
