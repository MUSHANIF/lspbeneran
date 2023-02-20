<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('jnsid');
            $table->unsignedBigInteger('layananid');  
            $table->integer('biaya')->nullable();    
            $table->integer('jumlah')->nullable();      
            $table->date('waktu')->nullable();            
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('jnsid')->references('id')->on('jnslayanans')->onDelete('cascade');
            $table->foreign('layananid')->references('id')->on('layanans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
