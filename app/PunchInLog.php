<?php

namespace App;

use Carbon\Carbon;
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

    /**
     * Get the punch in log's work start time.
     *
     * @param  string  $value
     * @return Carbon
     */
    public function getWorkStartTimeAttribute($value)
    {
        $workStartTime = new Carbon($value);
        $workStartTime = $workStartTime->toTimeString();

        return $workStartTime;
    }

    /**
     * Get the punch in log's work end time.
     *
     * @param  string  $value
     * @return Carbon
     */
    public function getWorkEndTimeAttribute($value)
    {
        $workEndTime = new Carbon($value);
        $workEndTime = $workEndTime->toTimeString();

        return $workEndTime;
    }
}
