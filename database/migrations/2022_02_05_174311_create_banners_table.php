<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('ban_id');
            $table->string('ban_title',100)->nullable();
            $table->text('ban_subtitle')->nullable();
            $table->string('ban_button',30)->nullable();
            $table->string('ban_url',190)->nullable();
            $table->string('ban_image',50)->nullable();
            $table->integer('ban_order')->nullable();
            $table->integer('ban_publish')->default(0);
            $table->integer('ban_creator')->nullable();
            $table->integer('ban_editor')->nullable();
            $table->string('ban_slug',40)->nullable();
            $table->integer('ban_status')->default(1);
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
        Schema::dropIfExists('banners');
    }
}
