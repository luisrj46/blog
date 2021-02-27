<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->mediumText('url')->nullable();
            $table->mediumText('excerpt')->nullable();
            $table->longText('body')->nullable();
            $table->longText('iframe')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamp('published_at')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->nullable()->onDelete('cascade');;
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('pos');
    }
}
