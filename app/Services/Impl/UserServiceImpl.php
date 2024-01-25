<?php
namespace App\Services\impl;

use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class UserServiceImpl implements UserService
{
    private array $users = [
        'faiz' => 'rahasia'
    ];
        // dd($users);
    function login(string $user, string $password): bool
    {
        // $users = [
        //         'faiz' => 'rahasia',
        //         // 'ahuy' => '123'
        //     ];
        if($user != 'faiz'){
            return false;
        }

        $correctPassword = $password;
        // if($password == $correctPassword){
        //     return true;
        // } else {
        //     return false;
        // }

        //atau
        return $password == $correctPassword;
    }

    // function login(string $email, string $password): bool
    // {
    //     // dd($password);
    //     return Auth::attempt([
    //         "email" => $email,
    //         "password" => $password
    //     ]);
    // }
}
