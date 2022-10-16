<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class timeRestriction extends Model
{
    use HasFactory;
    protected $table='time_restriction';
    protected $dates = ['entry_time','exit_time'];
}
