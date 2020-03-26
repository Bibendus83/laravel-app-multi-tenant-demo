<?php

namespace App\Http\Middleware;

use Closure;
use JavaScript;
use App;

class InitJavascriptConstants
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
        // Per aggiungere l'eventuale traduzione delle singole stringhe su elementi vue guardare a questo link:
        // https://medium.com/@konafets/localization-with-laravel-and-vuejs-e27068e68ee8

        JavaScript::put([
            'locale' => App::getLocale(),
            'defaultProfileImage' => asset('img/generic_profile_medic.png'),
            'baseUrl' => url('/'),
            'apiUrl' => setting('api_url', 'UNSET_OAUTH_SERVICE_API'),
        ]);

        return $next($request);
    }
}
