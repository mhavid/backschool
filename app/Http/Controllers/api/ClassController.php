<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\User;
use App\Transformers\Json;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('token');
    }

    public function index(Request $request)
    {
        try {
            $user = User::select('name','email','foto')->get();
            $ret = [
                'students' => $user,
                'wali_kelas' => [],
                'teachers' => []
            ];
            return Json::response($ret);
        } catch (\Throwable $th) {
            if(env('APP_DEBUG') == true) return Json::response($th->getMessage());
            return Json::response([], 'Error Server', 500);
        }
    }

    public function classes(Request $request)
    {
        try {
            $class = Kelas::where('id_school', decrypt($request->id_school))
                          ->select('id as value','code','name as label')
                          ->get();
            $ret = [
                'class' => $class,
            ];
            return Json::response($ret);
        } catch (\Throwable $th) {
            if(env('APP_DEBUG') == true) return Json::response($th->getMessage());
            return Json::response([], 'Error Server', 500);
        }
    }
}
