<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadingFullTestLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reading_full_test_lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('level_user_id')->unsigned();
            $table->text('content_lesson_first');
            $table->text('content_highlight_first');
            $table->text('content_lesson_second');
            $table->text('content_highlight_second');
            $table->text('content_lesson_third');
            $table->text('content_highlight_third');
            $table->string('image_feature')->nullable();
            $table->text('content_quiz_first');
            $table->text('content_answer_quiz_first');
            $table->text('content_quiz_second');
            $table->text('content_answer_quiz_second');
            $table->text('content_quiz_third');
            $table->text('content_answer_quiz_third');
            $table->integer('total_questions');
            $table->integer('limit_time')->default(60);
            $table->integer('order_lesson');
            $table->integer('admin_responsibility')->unsigned();
//            $table->integer('type_lesson_id')->default(4);
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
        Schema::dropIfExists('reading_full_test_lessons');
    }
}
