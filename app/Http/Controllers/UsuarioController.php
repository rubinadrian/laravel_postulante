<?php

namespace App\Http\Controllers;
use Kreait\Firebase\Factory;

use App\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index() {
        return User::where('admin', 1)->select('id','name','email','phone')->get();
    }

    public function setUserAdmin(Request $request) {
        $user = $this->getUserEmailPhone($request);

        if($user) {
            $auth = $this->getAuthFireBase($request);
            $auth->setCustomUserClaims($user->uid_fb, ['admin' => true]);
            $user->admin = true;
            $user->save();
            return ['ok'=> true];
        }


        return ['error' => 'usuario no encontrado'];
    }

    public function delUserAdmin($id,Request $request) {

        $user = User::find($id);

        if($user) {
            $auth = $this->getAuthFireBase($request);
            $auth->setCustomUserClaims($user->uid_fb, null);
            $user->admin = false;
            $user->save();
        }

        return ['ok'=>true];
    }

    private function getAuthFireBase(Request $request) {
        $token = $request->bearerToken();
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/../../../config/credenciales_firebase.json');
        $auth = $factory->createAuth();
        return $auth;
    }

    private function getUserEmailPhone(Request $request) {
        $user = null;
        if($request->has('email')) {
            $user = User::whereRaw("LOWER(email) LIKE ?", [strtolower($request->email)])->first();
        } else
        if ($request->has('phone')) {
            $user = User::where('phone', $request->phone)->first();
        }
        return $user;
    }
}
