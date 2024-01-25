<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(): Response
    {
        return response()
        ->view('user.login',[
            'title' => 'Login Gaes'
        ]);
    }

    public function doLogin(Request $request) : Response|RedirectResponse
    {
        $user = $request->input('user');
        $password = $request->input('password');

        // validate input
        if(empty($user || $password)){
            return response()->view('user.login', [
                'title' => 'Login Gaes',
                'error' => 'User or Password is required'
            ]);
        }

        // success login
        if($this->userService->login($user, $password)){
            $request->session()->put('user', $user);
            return redirect('/');
        }

        // failed login
        return response()->view('user.login', [
            'title' => 'Login Gaes Error',
            'error' => 'User or password is wrong'
        ]);


    }

    public function doLogout(Request $request): RedirectResponse
    {
        $request->session()->forget('user');
        return redirect('/');
    }
}