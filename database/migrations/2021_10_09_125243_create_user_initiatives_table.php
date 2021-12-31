<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInitiativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_initiatives', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->text('desc');
            $table->string('video');
            $table->text('benefit');
            $table->text('reason');
            $table->text('value');
            $table->text('qualy');
            $table->text('sustain');
            $table->text('advantage');
            $table->integer('number');
            $table->string('exp');
            $table->text('skill');
            $table->string('period');
            $table->date('period_to')->nullable();
            $table->date('period_from')->nullable();
            $table->string('hours_freq');
            $table->integer('hours');
            $table->text('notes')->nullable();
            $table->text('terms');
            $table->boolean('approved')->default(0);
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
        Schema::dropIfExists('initiatives');
    }
}
