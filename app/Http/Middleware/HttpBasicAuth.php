<?php
/**
 * Created by PhpStorm.
 * User: safakveziran
 * Date: 2019-03-23
 * Time: 08:57
 */

namespace App\Http\Middleware;

use Closure;

class HttpBasicAuth
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
        $envs = [
            'dev',
            'staging',
            'production'
        ];

        if(in_array(app()->environment(), $envs)) {
            if($request->getUser() != env('API_USERNAME') || $request->getPassword() != env('API_PASSWORD')) {
                $headers = array('WWW-Authenticate' => 'Basic');
                return response('Unauthorized', 401, $headers);
            }
        }

        return $next($request);
    }

}