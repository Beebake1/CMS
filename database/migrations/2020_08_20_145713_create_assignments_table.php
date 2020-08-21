<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->longText('description')->nullable();
            $table->unsignedInteger('course');
            $table->foreign('course')->references('id')->on('courses')->onDelete('cascade');
            // $table->unsignedInteger('student');
            // $table->foreign('student')->references('id')->on('students')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();

        });
    }

}
