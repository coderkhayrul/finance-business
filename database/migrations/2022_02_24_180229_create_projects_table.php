<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('project_id');
            $table->string('project_title', 150)->nullable();
            $table->string('project_url', 100)->nullable();
            $table->string('project_image')->nullable();
            $table->text('project_remarks')->nullable();
            $table->integer('project_order')->nullable();
            $table->integer('project_publish')->nullable();
            $table->integer('project_creator')->nullable();
            $table->integer('project_editor')->nullable();
            $table->string('project_slug', 50)->nullable();
            $table->integer('project_status')->default(1);
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
        Schema::dropIfExists('projects');
    }
}
