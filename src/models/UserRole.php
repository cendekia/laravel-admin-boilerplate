<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
