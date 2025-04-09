<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClearanceRequest extends Model
{
    public function employee() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function supervisor() {
        return $this->belongsTo(User::class, 'supervisor_id');
    }

    public function department() {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
