<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->string('full_name');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('sub_branch_id');
            $table->timestamps();
        });

        Schema::table('instructors', function (Blueprint $table) {
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
        Schema::dropIfExists('instructors');
    }
}
