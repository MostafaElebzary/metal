<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_data', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('logo');
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('snapchat')->nullable();
            $table->integer('finishedproject');
            $table->integer('inprogressproject');
            $table->integer('coveredcities');
            $table->integer('winningaward');
            $table->string('dayopenfrom');
            $table->string('dayopento');
            $table->string('houropenfrom');
            $table->string('houropento');
            $table->string('address_ar');
            $table->string('address_en');
            $table->string('contact_number');

            $table->string('daysclosed');

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
        Schema::dropIfExists('main_data');
    }
}
