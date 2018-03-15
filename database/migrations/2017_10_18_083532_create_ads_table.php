<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->integer('category_id')->unsigned();
            $table->string('city');
            $table->text('images');
            $table->text('description');
            $table->boolean('pull_contact_info')->default(0);
            $table->string('phone')->length(30)->nullable();
            $table->string('email')->length(100)->nullable();
            $table->integer('price')->unsigned();
            $table->boolean('approve')->default(0);
            $table->boolean('featured')->default(0);
            $table->timestamps();

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
