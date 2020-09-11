<?php

namespace App\Http\Middleware;
use App\User;
use Firebase\Auth\Token\Exception\InvalidToken;
use Kreait\Firebase\Factory;
use Illuminate\Support\Facades\Auth;

use Closure;

class AuthTokenFirebase
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
        if(!$request->has('token')) { abort(403, 'Unauthorized action.1'); };

        $token = $request->token;

        $user = User::where('remember_token', $token)->first();
        if($user) {
            Auth::loginUsingId($user->id);
            return $next($request);
        }

        $factory = (new Factory)->withServiceAccount(__DIR__ . '/../../../config/credenciales_firebase.json');
        $auth = $factory->createAuth();

        try {
            $verifiedIdToken = $auth->verifyIdToken($token);
        } catch (\InvalidArgumentException $e) {
            // return 'The token could not be parsed: '.$e->getMessage();
            exit($e->getMessage());
            abort(403, 'Unauthorized action.2');
        } catch (InvalidToken $e) {
            // return 'The token is invalid: '.$e->getMessage();
            abort(403, 'Unauthorized action.3');
        }

        $uid = $verifiedIdToken->getClaim('sub');
        if(!$uid) { abort(403, 'Error al obtener el uid del usuario'); };
        $user = User::updateOrCreate(['keyfirestore'=>$uid]);
        $user->remember_token = $token;
        $user->save();
        Auth::loginUsingId($user->id);

        return $next($request);
    }
}
