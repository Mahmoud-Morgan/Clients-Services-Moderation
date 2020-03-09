<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_services', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->bigInteger('client_id')->unsigned();
            $table->bigInteger('service_name_id')->unsigned();
            $table->primary(array('client_id','service_name_id'));
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('service_name_id')->references('id')->on('service_names');
            $table->string('type');
            $table->text('link');
            $table->text('description');
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
        Schema::dropIfExists('client_services');
    }
}
