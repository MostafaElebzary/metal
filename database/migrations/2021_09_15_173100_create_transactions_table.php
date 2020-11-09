<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['export', 'import'])->default('import');
            $table->enum('status', ['secret', 'urgent','all'])->default(null)->nullable();
            $table->string('desc');
            $table->bigInteger('number');
            $table->date('trans_date');

            $table->bigInteger('trans_type_id')->unsigned(); 
            $table->foreign('trans_type_id')->references('id')->on('transactions_types')->onDelete('cascade');

            $table->bigInteger('user_id')->unsigned(); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


            $table->bigInteger('thirdparty_id')->unsigned(); 
            $table->foreign('thirdparty_id')->references('id')->on('third_parties')->onDelete('cascade'); 
            $table->string('note')->nullable();


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
        Schema::dropIfExists('transactions');
    }
}
