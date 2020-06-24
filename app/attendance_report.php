<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attendance_report extends Model
{
    public $table = "attendance_report";
    protected $fillable = ['id','employee_no','intime','breakstart','breakend','outtime','created_at','updated_at','deleted'];
}