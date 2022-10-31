<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Transformers\Json;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('token');
    }

    public function index()
    {
        $users = User::get();
        return Json::response($users);
    }
}
