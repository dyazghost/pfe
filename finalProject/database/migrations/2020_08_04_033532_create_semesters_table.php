<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semesters', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->string('semester_name');
            $table->unsignedBigInteger('diploma_id');
            $table->date('semester_startdate');
            $table->date('semester_enddate');
            $table->timestamps();
        });

        Schema::table('semesters', function (Blueprint $table) {
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
        Schema::dropIfExists('semesters');
    }
}
