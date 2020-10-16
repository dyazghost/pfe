<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->string('fullname');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('sub_branch_id');
            $table->unsignedBigInteger('student_code');
            $table->string('student_CIN');
            $table->string('student_CNE');
            $table->timestamps();

        });

        Schema::table('students', function (Blueprint $table) {
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('sub_branch_id')->references('id')->on('sub_branches')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
