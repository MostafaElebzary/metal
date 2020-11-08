<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser($id){
        $user = User::where('id',$id)->first();
        return view('users',["name"=>$user['EmpName'] ?? "no User found"]);
    }
}
