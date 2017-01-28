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
        Schema::create('categorys', function(Blueprint $table) {
            $table->increments('id');
            $table->string('category_name',50);
            $table->timestamps();
        });

        Schema::create('sub_categorys',function(Blueprint $table){
            $table->increments('id');
            $table->string('sub_category_name',50);
            $table->timestamps();

        });

        Schema::create('categorys_sub_categorys',function(Blueprint $table){
            $table->integer('category_id')->unsigned()->index();
            $table->foreign('category_id')->on('categorys')->references('id');

            $table->integer('sub_category_id')->unsigned()->index();
            $table->foreign('sub_category_id')->on('sub_categorys')->references('id');
            $table->timestamps();
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('question_text');
            $table->string('picture');
            $table->integer('time')->default(30);
            $table->integer('question_value')->default(50);
            $table->integer('sub_category_id')->unsigned();
            $table->integer('category_id')->unsigned();

            $table->timestamps();

            $table->foreign('sub_category_id')
                ->on('sub_categorys')
                ->references('id')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->on('sub_categorys')
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
        Schema::table('categorys_sub_categorys', function(Blueprint $table){
            $table->dropForeign('categorys_sub_categorys_category_id_foreign');
            $table->dropForeign('categorys_sub_categorys_sub_category_id_foreign');
        });
        Schema::dropIfExists('categorys_sub_categorys');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('categorys');
        Schema::dropIfExists('sub_categorys');
    }
}
