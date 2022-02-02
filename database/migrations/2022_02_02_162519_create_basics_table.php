<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basics', function (Blueprint $table) {
            $table->id();
            $table->string('basic_company', 150)->nullable();
            $table->string('basic_title', 190)->nullable();
            $table->string('basic_logo')->nullable();
            $table->string('basic_flogo')->nullable();
            $table->string('basic_favicon')->nullable();
            $table->integer('basic_status')->default(1);
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
        Schema::dropIfExists('basics');
    }
}
