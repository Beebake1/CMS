<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentFilesTable extends Migration
{

    public function up()
    {
        Schema::create('assignment_files', function (Blueprint $table) {
            $table->id();
            $table->string('file');
            $table->string('file_name');
            $table->unsignedInteger('assignment');
            $table->foreign('assignment')->references('id')->on('assignments')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();

        });
    }

}
