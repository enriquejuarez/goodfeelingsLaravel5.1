<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->unique();
            $table->string('title');
            $table->enum('status', ['on', 'off'])->default('on');
            $table->timestamps();
        });

        $date = Carbon::now();
        DB::table('sections')->insert(array('name'=>'packages', 'title'=>'PAQUETES DISPONIBLES', 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
        DB::table('sections')->insert(array('name'=>'destinations', 'title'=>'CONOCE EL DESTINO', 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
        DB::table('sections')->insert(array('name'=>'testimonies', 'title'=>'TESTIMONIOS', 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
        DB::table('sections')->insert(array('name'=>'services', 'title'=>'NUESTROS SERVICIOS', 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
        DB::table('sections')->insert(array('name'=>'we', 'title'=>'¿PORQUÉ ELEGIRNOS?', 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
