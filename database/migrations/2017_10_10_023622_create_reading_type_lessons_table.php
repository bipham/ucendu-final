<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadingTypeLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 1. Practice, 2. Mini test, 3. Mix test, 4. Full test
     */
    public function up()
    {
        Schema::create('reading_type_lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_lesson')->unique();
            $table->integer('admin_responsibility')->unsigned();
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
        Schema::dropIfExists('reading_type_lessons');
    }
}
