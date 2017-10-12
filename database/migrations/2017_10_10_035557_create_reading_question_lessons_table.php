<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadingQuestionLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reading_question_lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lesson_id')->unsigned();
            $table->integer('type_lesson_id')->nullable();
            $table->integer('question_custom_id')->unsigned();
            $table->string('answer');
            $table->string('keyword')->nullable();
            $table->integer('type_question_id')->unsigned();
//            $table->foreign('type_question_id')->references('id')->on('reading_type_questions')->onDelete('cascade');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('reading_question_lessons');
    }
}
