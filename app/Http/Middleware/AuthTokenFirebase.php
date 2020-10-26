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
        // $request->attributes->add(['myAttribute' => 'myValue']);
        $token = $request->bearerToken();
        if(!$token) { abort(403, 'Unauthorized action.1');}

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
            abort(403, 'Unauthorized action.2 - ' . $e->getMessage());
        } catch (InvalidToken $e) {
            abort(403, 'Unauthorized action.3 - ' . $e->getMessage());
        }

        $uid = $verifiedIdToken->getClaim('sub');
        $user_fb = $auth->getUser($uid);
        if(!$uid) { abort(403, 'Error al obtener el uid del usuario'); };
        $user = User::updateOrCreate(['uid_fb'=>$uid]);
        $user->remember_token = $token;
        $user->email = $user_fb->email;
        $user->name = $user_fb->displayName;
        $user->phone = $user_fb->phoneNumber;
        $user->admin = $user_fb->customClaims['admin'];
        $user->save();
        Auth::loginUsingId($user->id);

        return $next($request);
    }
}
