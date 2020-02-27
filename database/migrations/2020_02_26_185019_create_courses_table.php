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
            $table->text('description')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->string('duration')->nullable();
            $table->string('timetable')->nullable();
            $table->string('fees')->nullable();
            $table->string('exam')->nullable();
            $table->string('examregfees')->nullable();
            $table->string('examfees')->nullable();
            $table->string('note')->nullable();
            $table->string('cover')->nullable();
            $table->boolean('status')->default(false);

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
