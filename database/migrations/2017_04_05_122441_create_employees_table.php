<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('spouse_name');
            $table->string('blood_group');
            $table->string('nationality');
            $table->string('religion');
            $table->string('guardian_mobile');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->string('alt_mobile');
            $table->string('department');
            $table->string('skype');
            $table->string('linkedin');
            $table->longText('present_address');
            $table->longText('permanent_address');
            $table->string('job_title');
            $table->string('job_type');
            $table->string('supervisor_id');
            $table->string('account_no');
            $table->date('join_date');
            $table->string('image_url');
            $table->string('nid_url');
            $table->string('nid_no');
            $table->float('basic');
            $table->float('loan');
            $table->longText('equipments');
            $table->boolean('enable');
            $table->integer('pf');
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
        Schema::drop('employees');
    }
}
