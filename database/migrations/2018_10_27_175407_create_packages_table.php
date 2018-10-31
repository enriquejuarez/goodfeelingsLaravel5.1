<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file', 150);
            $table->string('title', 200);
            $table->decimal('price', 10, 2);
            $table->date('date_initial');
            $table->date('date_final');
            $table->mediumText('excerpt')->nullable();
            $table->enum('status', ['on', 'off'])->default('on');
            $table->timestamps();
        });
        $date = Carbon::now();
        DB::table('packages')->insert(array('file'=>'http://goodfeelings.test/imagenes/Paquete1.jpg', 'title'=>'salida de Veracruz', 'price' => 64480.00, 'date_initial'=>'2019-04-17', 'date_final' => '2019-04-24', 'excerpt' => 'TODO INCLUIDO 8 días / 7 noches', 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
        DB::table('packages')->insert(array('file'=>'http://goodfeelings.test/imagenes/Paquete2.jpg', 'title'=>'salida de Veracruz', 'price' => 64480.00, 'date_initial'=>'2019-07-12', 'date_final' => '2019-07-19', 'excerpt' => 'TODO INCLUIDO 8 días / 7 noches', 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
        DB::table('packages')->insert(array('file'=>'http://goodfeelings.test/imagenes/Paquete3.jpg', 'title'=>'salida de Puebla', 'price' => 64480.00, 'date_initial'=>'2019-07-24', 'date_final' => '2019-07-31', 'excerpt' => 'TODO INCLUIDO 8 días / 7 noches', 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
