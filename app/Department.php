<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * Get the users for the blog post.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
