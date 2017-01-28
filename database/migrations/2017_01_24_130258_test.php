<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Test extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->boolean('pause')->default('0');
            $table->boolean('showing_mark')->default('1');
            $table->boolean('final_verdict_showing')->default('1');
            $table->integer('success_weight');
            $table->boolean('skip_question')->default('1');
            $table->time('max_test_time');
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

        Schema::create('tests_questions',function(Blueprint $table){
            $table->integer('test_id')->unsigned()->index();
            $table->foreign('test_id')->on('tests')->references('id');

            $table->integer('question_id')->unsigned()->index();
            $table->foreign('question_id')->on('questions')->references('id');
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
        Schema::table('tests_questions', function(Blueprint $table){
            $table->dropForeign('tests_questions_test_id_foreign');
            $table->dropForeign('tests_questions_question_id_foreign');
        });
        Schema::dropIfExists('tests');
        Schema::dropIfExists('tests_questions');
    }
}
