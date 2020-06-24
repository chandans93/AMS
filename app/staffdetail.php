<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class staffdetail extends Model
{
    public $table = "staffdetail";
    protected $fillable = ['id','employee_no','employee_name','designation','site_name','created_at','updated_at','deleted'];
}