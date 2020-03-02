<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use YourAppRocks\EloquentUuid\Traits\HasUuid;

class Department extends Model
{
    use HasUuid;

    /**
     * Get the users for the department.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
