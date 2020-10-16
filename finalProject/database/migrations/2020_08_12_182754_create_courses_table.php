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
            $table->engine = "InnoDB";
            $table->id();
            $table->string('course_name');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('sub_branch_id');
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('instructor_id');
			$table->unsignedBigInteger('diploma_id');
            $table->timestamps();
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('sub_branch_id')->references('id')->on('sub_branches')->onDelete('cascade');
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');
			$table->foreign('diploma_id')->references('id')->on('diplomas')->onDelete('cascade');
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
