<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('content');
            $table->integer('user_id');
            $table->timestamps();
            
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
        });
    }
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};
