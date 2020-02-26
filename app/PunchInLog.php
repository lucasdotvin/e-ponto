<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use YourAppRocks\EloquentUuid\Traits\HasUuid;

class PunchInLog extends Model
{
    use HasUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'work_day', 'work_start_time', 'work_end_time', 'work_total_time'
    ];

    /**
     * Get the user of the punch in log.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'worker_id');
    }
}
