<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_categories', function (Blueprint $table) {
            $table->bigIncrements('procate_id');
            $table->string('procate_name', 100)->unique();
            $table->string('procate_url', 100)->nullable();
            $table->text('procate_remarks')->nullable();
            $table->integer('procate_publish')->default(1);
            $table->integer('procate_creator')->nullable();
            $table->integer('procate_order')->nullable();
            $table->integer('procate_editor')->nullable();
            $table->string('procate_slug', 50)->nullable();
            $table->integer('procate_status')->default(1);
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
        Schema::dropIfExists('project_categories');
    }
}
