<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overtimes extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table="overtimes";
    protected $fillable = [
        'employee_id','date','time_started','time_ended'
    ];
}
