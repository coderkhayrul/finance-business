<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('content_id');
            $table->integer('page_id');
            $table->string('content_title', 250);
            $table->text('content_subtitle')->nullable();
            $table->longText('content_details')->nullable();
            $table->string('content_image', 50)->nullable();
            $table->integer('content_editor')->nullable();
            $table->string('content_slug')->nullable();
            $table->integer('content_status')->default(1);
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
        Schema::dropIfExists('contents');
    }
}
