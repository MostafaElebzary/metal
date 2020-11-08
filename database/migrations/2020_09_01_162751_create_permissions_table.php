<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 

            $table->enum('inbox',['yes','no'])->default('no');
            $table->enum('deleteinbox',['yes','no'])->default('no');
            $table->enum('addclient',['yes','no'])->default('no');
            $table->enum('addinreciept',['yes','no'])->default('no');
            $table->enum('addoutreciept',['yes','no'])->default('no');
            $table->enum('recieptsarchieve',['yes','no'])->default('no');
            $table->enum('clientsArchieve',['yes','no'])->default('no');
            $table->enum('operationsonclients',['yes','no'])->default('no');
            $table->enum('operationsonclientsarchieve',['yes','no'])->default('no');
            $table->enum('clientaccountstatement',['yes','no'])->default('no');
            $table->enum('websitepanel',['yes','no'])->default('no');
            $table->enum('controllpanel',['yes','no'])->default('no');
            $table->enum('homeinreciept',['yes','no'])->default('no');
            $table->enum('homeoutreciept',['yes','no'])->default('no');


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
        Schema::dropIfExists('permissions');
    }
}
