<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('projecttype_id')->unsigned();
            $table->foreign('projecttype_id')->references('id')->on('project_types')->onDelete('cascade');
            $table->bigInteger('mainclient_id')->unsigned();
            $table->foreign('mainclient_id')->references('id')->on('main_clients')->onDelete('cascade');

            $table->string('name');
            $table->string('address');
            $table->string('phone')->unique();
            $table->bigInteger('id_num');
            $table->bigInteger('check_num');
            $table->date('check_date');
            $table->bigInteger('taxepercent');
            $table->bigInteger('total');
            $table->bigInteger('amount');
            $table->string('part_number');
            $table->string('scheme_number');
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
        Schema::dropIfExists('clients');
    }
}
