<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Question extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function(Blueprint $table) {
            $table->increments('id');
            $table->string('category_name',50);
            $table->timestamps();
        });

        Schema::create('sub_categories',function(Blueprint $table){
            $table->increments('id');
            $table->string('sub_category_name',50);
            $table->timestamps();

        });

        Schema::create('question_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_name');
            $table->timestamps();
        });

        Schema::create('categories_sub_categories',function(Blueprint $table){
            $table->integer('category_id')->unsigned()->index();
            $table->foreign('category_id')->on('categories')->references('id');

            $table->integer('sub_category_id')->unsigned()->index();
            $table->foreign('sub_category_id')->on('sub_categories')->references('id');
            $table->timestamps();
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('question_text');
            $table->integer('question_type_id')->unsigned();
            $table->string('picture');
            $table->integer('time')->default(30);
            $table->integer('question_value')->default(50);
            $table->integer('sub_category_id')->unsigned();
            $table->integer('category_id')->unsigned();

            $table->timestamps();

            $table->foreign('sub_category_id')
                ->on('sub_categories')
                ->references('id')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->on('sub_categories')
                ->references('id')
                ->onDelete('cascade');

            $table->foreign('question_type_id')
                ->on('question_types')
                ->references('id')
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
        Schema::table('categories_sub_categories', function(Blueprint $table){
            $table->dropForeign('categories_sub_categories_category_id_foreign');
            $table->dropForeign('categories_sub_categories_sub_category_id_foreign');
        });

        Schema::dropIfExists('categories_sub_categories');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('sub_categories');
        Schema::dropIfExists('question_types');
    }
}
