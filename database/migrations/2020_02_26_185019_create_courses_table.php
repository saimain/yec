<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('lecture_id')->index();
            $table->text('description');
            $table->date('start');
            $table->date('end');
            $table->string('duration');
            $table->string('timetable');
            $table->string('fees');
            $table->string('exam');
            $table->string('examregfees');
            $table->string('examfees');
            $table->string('note');
            $table->string('cover');
            $table->timestamps();

            $table->foreign('lecture_id')->references('id')->on('lectures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
