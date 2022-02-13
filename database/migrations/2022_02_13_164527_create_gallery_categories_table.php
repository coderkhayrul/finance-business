<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_categories', function (Blueprint $table) {
            $table->bigIncrements('galcate_id');
            $table->string('galcate_name')->unique();
            $table->string('galcate_remarks')->nullable();
            $table->string('galcate_url')->nullable();
            $table->integer('galcate_order')->nullable();
            $table->integer('galcate_creator');
            $table->integer('galcate_editor')->nullable();
            $table->string('galcate_slug')->nullable();
            $table->integer('galcate_status')->default(1);
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
        Schema::dropIfExists('gallery_categories');
    }
}
