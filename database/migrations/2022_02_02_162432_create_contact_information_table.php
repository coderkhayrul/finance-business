<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_information', function (Blueprint $table) {
            $table->id();
            $table->string('cont_phone1', 25)->nullable();
            $table->string('cont_phone2', 25)->nullable();
            $table->string('cont_phone3', 25)->nullable();
            $table->string('cont_phone4', 25)->nullable();
            $table->string('cont_email1', 50)->nullable();
            $table->string('cont_email2', 50)->nullable();
            $table->string('cont_email3', 50)->nullable();
            $table->string('cont_email4', 50)->nullable();
            $table->text('cont_add1')->nullable();
            $table->text('cont_add2')->nullable();
            $table->text('cont_add3')->nullable();
            $table->text('cont_add4')->nullable();
            $table->integer('cont_status')->default(1);
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
        Schema::dropIfExists('contact_information');
    }
}
