<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Transformers\Json;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $user = User::where('email', $request->username)
                        ->where('password', $request->password)
                        ->get();
            $count = count($user);
            if($count > 0){
                $ret = [
                    'id_school' => encrypt($user[0]->id_school),
                    'id_user' => encrypt($user[0]->id),
                    'user' => $user[0]->name,
                    'token' => $this->handshake()
                ];
                return Json::response($ret);
            }else{
                return Json::response([], 'Username and password not found', 0);
            }
        } catch (\Throwable $th) {
            if(env('APP_DEBUG') == true) return Json::response($th->getMessage());
            return Json::response([], 'Error Server', 500);
        }
    }

    private function handshake()
    {
        // return $next($request);
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';

        return $hash = md5(getHostByName(getHostName().$ipaddress));
    }
}
