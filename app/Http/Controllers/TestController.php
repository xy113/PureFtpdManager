<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    public function index(Request $request){
//        User::create([
//            'username'=>'admin',
//            'password'=>Hash::make('DSX@12345'),
//            'email'=>'songdewei@163.com'
//        ]);

        return 'ok';
    }
}
