<?php

namespace Modules\Billing\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Modules\Billing\Entities\Event;

class EventMiddleware
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

        // Log event
        $event = new Event();
        $event->url = $request->url();
        $event->ip = $request->ip();

        // Dont save users password or encrypt it
        $params = $request->all();
        unset($params['password']);
        $event->params = \GuzzleHttp\json_encode($params);

        // Save token for security reasons
        $event->frontend_token = Session::get('frontend_token') ?? 'fist-request';
        $event->backend_token = $request->fingerprint() ?? 'not-set'; // TODO : should stay the same when changing params
        $event->csrf_token = $request->input('_token') ?? $request->cookie('XSRF-TOKEN') ?? 'not-set';

        // Store session id
        $event->session_id = $request->session()->getId();

        // Store Method
        $event->method = $request->getMethod();

        $event->save(); // persist to memory - 10 MB cache -

        return $next($request);

    }

}
