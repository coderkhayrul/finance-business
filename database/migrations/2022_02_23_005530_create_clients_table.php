<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('client_id');
            $table->string('client_title', 100)->nullable();
            $table->string('client_url', 200)->nullable();
            $table->text('client_remarks')->nullable();
            $table->string('client_image', 50)->nullable();
            $table->integer('client_order')->nullable();
            $table->integer('client_feature')->default(0);
            $table->integer('client_publish')->default(1);
            $table->integer('client_creator')->nullable();
            $table->integer('client_editor')->nullable();
            $table->string('client_slug', 50)->unique();
            $table->integer('client_status')->default(1);
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
        Schema::dropIfExists('clients');
    }
}
