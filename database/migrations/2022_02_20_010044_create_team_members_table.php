<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->bigIncrements('team_id');
            $table->string('team_name', 50);
            $table->string('team_designation', 100)->nullable();
            $table->string('team_facebook', 200)->nullable();
            $table->string('team_twitter', 200)->nullable();
            $table->string('team_linkedin', 200)->nullable();
            $table->string('team_instragram', 200)->nullable();
            $table->text('team_remarks')->nullable();
            $table->string('team_image', 50)->nullable();
            $table->integer('team_order')->nullable();
            $table->integer('team_creator')->nullable;
            $table->integer('team_editor')->nullable();
            $table->string('team_slug')->nullable();
            $table->integer('team_status')->default(1);
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
        Schema::dropIfExists('team_members');
    }
}
