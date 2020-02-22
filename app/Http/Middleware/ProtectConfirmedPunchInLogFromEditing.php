<?php

namespace App\Http\Middleware;

use App\PunchInLog;
use Closure;

class ProtectConfirmedPunchInLogFromEditing
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $punchInLogUuid = $request->punch_in_log;
        $punchInLog = PunchInLog::findByUuid($punchInLogUuid);

        if ($punchInLog->confirmed_by) {
            return redirect(route('punch-in-logs.show', $punchInLog));
        }

        return $next($request);
    }
}
