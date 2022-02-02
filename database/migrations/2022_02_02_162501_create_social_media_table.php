<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_media', function (Blueprint $table) {
            $table->id();
            $table->text('sm_facebook')->nullable();
            $table->text('sm_twitter')->nullable();
            $table->text('sm_linkedin')->nullable();
            $table->text('sm_dribbble')->nullable();
            $table->text('sm_youtube')->nullable();
            $table->text('sm_slack')->nullable();
            $table->text('sm_instagram')->nullable();
            $table->text('sm_behance')->nullable();
            $table->text('sm_google')->nullable();
            $table->text('sm_raddit')->nullable();
            $table->integer('sm_status')->default(1);
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
        Schema::dropIfExists('social_media');
    }
}
