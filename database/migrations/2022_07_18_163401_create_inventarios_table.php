<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->string('key_name', 60);
            $table->integer('cantidad');
            $table->float('precio');
            $table->string('talla', 4);
            $table->string('marca', 20);
            $table->string('color', 15);
            $table->string('seccion', 15);
            $table->string('tipo_prenda', 15);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventarios');
    }
}
