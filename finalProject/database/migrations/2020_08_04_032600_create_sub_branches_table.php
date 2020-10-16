<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_branches', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->string('sub_branchName');
            $table->unsignedBigInteger('branch_id');
            $table->timestamps();
        
        });

        Schema::table('sub_branches', function (Blueprint $table) {
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');

        
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_branches');
    }
}
