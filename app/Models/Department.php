<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey = 'department_id';
    public $incrementing = true; // If it's an auto-incrementing key
    protected $keyType = 'int'; // If it's an integer
}
