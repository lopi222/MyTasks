<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Client\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    function indexLogin(): View
    {
        return view('login.login');
    }

    function indexRegist(): View
    {
        return view('login.regist');
    }

    function storeLogin(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $auth = Auth::attempt(
            [
                'username' => $data['login'],
                'password' => $data['password'],
            ],
            false
        );

        if($auth)
        {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return redirect()->route('login')->withErrors(['login' => 'Неверный пароль или логин!']); 
    }

    function storeRegist(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'login' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $isUser = User::query()
        ->where('username', $data['login'])
        ->orWhere('email', $data['email'])
        ->first('id');

        if(isset($isUser))
        {
            return redirect()->route('regist')->withErrors(['login' => 'Такой пользователь с логином или почтой есть в системе!']);; 
        }

        User::create(
            [
                'username' => $data['login'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        
        $auth = Auth::attempt(
            [
                'username' => $data['login'],
                'password' => $data['password'],
            ],
            false
        );

        $request->session()->regenerate();

        return redirect()->route('home');
   
    }
}
