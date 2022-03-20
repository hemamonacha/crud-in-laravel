<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_first_name','emp_last_name','emp_email','company_id','emp_phone'
    ];
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
