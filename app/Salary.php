<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
                            'user_id',
                            'year',
                            'month',
                            'basic',
                            'bonus',
                            'loan',
                            'leave_allowed',
                            'leave_taken',
                            'late_count',
                            'salary',
                            'home_allowance',
                            'health_allowance',
                            'transportation_allowance',
                            'mobile_allowance',
                            'sales_profit',
                            'profit_share',
                            'lunch',
                            'other_earnings',
                            'provident_fund',
                            'other_deductions'
                        ];


    public function employeeInfo(){
        return $this->belongsTo('App\Employee','user_id','user_id');
    }

}
