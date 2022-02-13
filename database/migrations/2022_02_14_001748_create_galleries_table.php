<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->bigIncrements('gallery_id');
            $table->string('gallery_title')->nullable();
            $table->string('gallery_remarks', 200)->nullable();
            $table->integer('gallery_category_id')->nullable();
            $table->string('gallery_image')->nullable();
            $table->string('gallery_order');
            $table->string('gallery_publish')->default(1);
            $table->string('gallery_creator')->nullable();
            $table->string('gallery_editor')->nullable();
            $table->string('gallery_slug')->nullable();
            $table->string('gallery_status')->default(1);
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
        Schema::dropIfExists('galleries');
    }
}
