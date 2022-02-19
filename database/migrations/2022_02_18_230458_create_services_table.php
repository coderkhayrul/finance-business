<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('service_id');
            $table->string('service_title',150);
            $table->text('service_subtitle')->nullable;
            $table->text('service_details')->nullable();
            $table->string('service_icon', 50)->nullable();
            $table->string('service_image', 50)->nullable();
            $table->string('service_url', 150)->nullable();
            $table->integer('service_order')->nullable();
            $table->integer('service_feature')->default(0);
            $table->integer('service_publish')->default(1);
            $table->integer('service_creator')->nullable();
            $table->integer('service_editor')->nullable();
            $table->string('service_slug')->nullable();
            $table->integer('service_status')->default(1);
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
        Schema::dropIfExists('services');
    }
}
