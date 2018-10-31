<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePackagesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 150)->nullable();
            $table->string('subtitle', 150)->nullable();
            $table->text('description');
            $table->enum('status', ['on', 'off'])->default('on');
            $table->integer('package_id')->unsigned();
            $table->foreign('package_id')->references('id')->on('packages');
            $table->timestamps();
        });

        $date = Carbon::now();
        DB::table('packages_details')->insert(array('title'=>'Día 1','subtitle'=>'¡Bienvenidos a Cancún!', 'description'=>'Comenzamos nuestra maravillosa experiencia, con la emoción de levantarse temprano para vernos en el Aereopuerto de Veracruz para volar al Caribe Mexicano, Cancun donde ya nos esperan para trasladarnos a nuestro hotel paradisfrutar  con el traje de baño  las amenidades que el hotel tiene listo para el grupo, en el mar y en el area de albercas por el grupo de animación que estan programadas por el hotel.','package_id'=>1, 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
        DB::table('packages_details')->insert(array('title'=>'Día 2', 'subtitle'=>'Tulum 5ta. Avenida', 'description'=>'Desayuno buffet, nuestro transporte pasara por nosotras al hotel y nos llevaran a la Riviera maya para conocer y recorrer Tulum la primera ciudad Maya descubierta por los conquistadores Españoles en el siglo XVI, y la única estructura amurallada construida a la orilla del mar. Posterior nos iremos a la famosa 5ta. Avenida en playa del Carmen donde tiendas, restaurantes, bares, recuerdos,heladerias, cafes, artistas y pintores presentas sus creaciones a los visitantes nacionales y extranjeros donde podras hacer tus comprars personales y souvenirs para amistades y familia, regresamos a hotel a disfrutar de los sancks preparados en la zona de la alberca, mientras disfrutas de la playa azul-turquesa, prepararnos para la cena en algun restaurant tematico para posterior ir al show que el mismo hotel presenta.','package_id'=>1, 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
        DB::table('packages_details')->insert(array('title'=>'Día 3', 'subtitle'=>'Xcaret', 'description'=>'Desayuno buffet elige tus alimentos con la gran variedad de la cocina internacional, ya listos pasaran por nosotras para llevarnos a Xcaret donde nos recibiran para darnos instrucciones y sacar el mayor provecho del parque, indicaran el restaurant preparado para nosotras (buffet).es un majestuoso parque con vestigios arqueológicos ubicado en Riviera Maya, Cancún a la orilla del mar Caribe Mexicano. Disfruta un espectáculo de noche, con más de 300 actores en escena, que resulta en un viaje musical por la historia de México, desde la época prehispánica hasta nuestros días, con todo el colorido de los trajes típicos, el folclor y las danzas. La recreación de un juego de Pelota prehispánico, una fiesta charra, un cementerio Mexicano, un acuario de arrecife de coral, un Mariposario y ríos subterráneos además de playas y albercas naturales, actividades como rios subterraneos  y un sinfín de atracciones que harán vivir experiencias mágicas, regresamos al hotel a saborear de una cena en el hotel.','package_id'=>1, 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
        DB::table('packages_details')->insert(array('title'=>'Día 4', 'subtitle'=>'Viaje en Yate privado', 'description'=>'Desayuno buffet, el transporte especial pasara al hotel por nosotras para dirigirnos a vivir gran experiencia al llevarnos al muelle para abordar un yate privado para el grupo donde disfrutaras los paisajes, tomaras el sol y realizaras snorquel en las clara y cristalinas aguas del mar Caribe, a medio día estará listo la comida en el yate para que tomes fuerza para que cantes a todo pulmón en el karaokee listo para las quinceañeras. Posterior regresamos al hotel para elegir otro restaurant temático para la cena y listos para el show nocturno del hotel.','package_id'=>1, 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
        DB::table('packages_details')->insert(array('title'=>'Día 5', 'subtitle'=>'Eco-parque Xel-Ha', 'description'=>'Desayuno buffet, nuevamente el transporte especial del parque Xcaret pasa por nosotros para dirigirnos a lo que es considerado como una de las maravillas naturales más grandes del mundo, el parque Xel-ha ofrece una de las mejores experiencias en el corazón de la Riviera Maya. Practica snorkel, observaras peces de una gran diversidad de colores y especies marinas que habitan en su caleta y en su cenotes, el parque todo incluido te tiene para ti toda la diversión que requieres y los alimentos tipo buffet en los restaurantes y en los mejores paisajes para admirar, sumergete en algunos de los cenotes, lagunas y cuevas o disfruta de las tirolesas que solo encontrarás en Xel-ha, al terminar regresamos a cenar al hotel para recobrar las energías para el parque que sigue, único en su tipo.','package_id'=>1, 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
        DB::table('packages_details')->insert(array('title'=>'Día 6', 'subtitle'=>'Xenses', 'description'=>'Desayuno y nuestro transporte estará listo para llevarnos a nuestra siguiente experiencia donde podrán a prueba todos nuestros sentidos ya que nada es lo que parece, Xenses es el nuevo parque de Experiencias Xcaret ubicado en Cancún y Riviera Maya. Un parque fuera de lo ordinario, un lugar tan divertido como mágico, tan asombroso como enigmático y tan disparatado como racional. En este parque, todos podremos ser protagonistas de una gran experiencia que, durante cinco horas aproximadamente, nos llevara por diferentes escenarios reales e imaginarios que rodearan nuestros sentidos, dentro de un espacio en donde vamos a relajarnos, divertirnos y asombrarnos, en un mundo en el que nuestra imaginación despertara y nuestra percepción será desafiada. Al concluir regresamos al hotel a tomar un chapuzón para después cenar.','package_id'=>1, 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
        DB::table('packages_details')->insert(array('title'=>'Día 7', 'subtitle'=>'Show de gala Circo Du Soleil', 'description'=>'Desayunaremos y comeremos en el hotel disfrutando los snaks en la alberca y las actividades programadas en la playa en nuestro último día en el Caribe Mexicano, y por la tarde nos prepararemos para nuestra Cena de Gala en las majestuosas instalaciones del Grupo Vidanta donde se encuentra el gran espectáculo de la Riviera Maya reconocida mundialmente el Circo Du Soleil, donde tendremos acceso especial a las instalaciones para nuestra cena dentro del teatro y posterior disfrutar tan impresionante espectáculo lleno de magia y color una experiencia que llevaras en todos tus sentidos.','package_id'=>1, 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
        DB::table('packages_details')->insert(array('title'=>'Día 8', 'subtitle'=>'Fin de la experiencia  Cancún-Riviera Maya', 'description'=>'Desayuno Buffet y traslado al Aereopuerto de Cancún para nuestro retorno a la Ciudad de Veracruz, agradeciendo la experiencia','package_id'=>1, 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
        DB::table('packages_details')->insert(array('subtitle'=>'PRECIO INCLUYE:', 'description'=>'Boletos aéreos viaje redondo veracruz- cancún - veracruz. Alojamiento en hoteles de categoria seleccionada.all inclusive Traslados aeropuerto - hotel - aeropuerto. Transporte de lujo durante el viaje. Coach acompañante. Entradas y visitas según el itinerario. Alimentos y bebidas todo incluido, según el itinerario. Seguro de viaje. Propinas para guía y conductor. Show en Circo Du Soleil','package_id'=>1, 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
        DB::table('packages_details')->insert(array('subtitle'=>'PRECIO NO INCLUYE:', 'description'=>'Ningún servicio no especificado. Actividades extras en los parques y/o souvenirs. Gastos personales. Excursiones opcionales. Alimentos en Parque Xenses y en 5ta. Avenida','package_id'=>1, 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
        DB::table('packages_details')->insert(array('subtitle'=>'ALOJAMIENTO:', 'description'=>'noches de alojamiento en el HOTEL DE CATEGORIA SELECCIONADA, habitación acomodación cuádruple. Desayunos, almuerzos, cenas diarias tipo buffet en los restaurantes del hotel. Snacks durante todo el día en el hotel. Bebidas no alcohólicas y refrescos ilimitados en cualquiera de sus bares.','package_id'=>1, 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
        DB::table('packages_details')->insert(array('subtitle'=>'TOURS:', 'description'=>'Tour a  Xcaret alimentos buffet. Viaje en yate, acceso a alimentos buffet y bebidas Tour Tulum, paseo por la 5ta. Avenida compras y artesanía, comida libre. Tour Xel-ha alimentos buffet. Tour al parque temático Xenses (despieta tus sentidos), no incluye alimentos. Show en Circo du Soleil espectáculo “Joya”.','package_id'=>1, 'status' => 'on', 'created_at' => $date, 'updated_at' => $date));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages_datails');
    }
}
