<?php
namespace App\Services\impl;

use App\Services\UserService;

class UserServiceImpl implements UserService
{
    private $users = [
        'faiz' => 'rahasia'
    ];

    function login(string $user, string $password): bool
    {
        // dd($user);
        if(!isset($this->$users[$user])){
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
}
