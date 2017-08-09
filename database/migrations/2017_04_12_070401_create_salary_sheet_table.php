<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalarySheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('year');
            $table->string('month');
            $table->float('basic');
            $table->float('bonus');
            $table->float('loan');
            $table->integer('leave_allowed');
            $table->integer('leave_taken');
            $table->integer('late_count');
            $table->integer('salary');
            $table->integer('home_allowance');
            $table->integer('health_allowance');
            $table->integer('transportation_allowance');
            $table->integer('mobile_allowance');
            $table->integer('sales_profit');
            $table->integer('profit_share');
            $table->integer('lunch');
            $table->integer('others_earning');
            $table->integer('provident_fund');
            $table->integer('others_deduction');
            $table->string('oe_text')->nullable();
            $table->string('od_text')->nullable();
            $table->integer('paid');
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
        Schema::drop('salaries');
    }
}
