<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformancesTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('month');
            $table->string('year');
            $table->string('wfp');
            $table->string('qw');
            $table->string('communication');
            $table->string('creativity');
            $table->string('honesty');
            $table->string('attitute');
            $table->string('cr');
            $table->string('ts');
            $table->string('la');
            $table->string('leave');
            $table->longText('comment');
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
        Schema::drop('performances');
    }
}
