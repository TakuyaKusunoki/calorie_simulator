<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        if (\Auth::user()->type == 'root') {
        $users = User::paginate(20);
        
        return view('users.index', [
            'users' => $users,
            
        ]);
        } else {
            return view('welcome');
        }
    }
    
    public function show($id)
    {
        $user = User::find($id);
        
         $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $foods = $user->foods()->orderBy('eat_date', 'desc')->paginate(100);
            
            $data = [
                'user' => $user,
                'foods' => $foods,
            ];
            $data += $this->counts($user);
            return view('users.show', $data);
        }else {
            return view('welcome');
        }
        
        return view('users.show', [
            'user' => $user,
            'foods' => $foods,
        ]);
    }
}
