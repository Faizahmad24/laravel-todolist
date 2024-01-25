<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function testLoginPage()
    {
        $this->get('/login')
        ->assertSeeText('Login Gaes');
    }

    //test login page for member
    public function testLoginPageForMember()
    {
        $this->withSession([
            'user' => 'faiz'
        ])->get('/login')->assertRedirect('/');
    }

    // login success
    public function testLoginSucess()
    {
        $this->post('/login', [
            'user' => 'faiz',
            'password' => 'rahasia'
        ])->assertRedirect('/')
        ->assertSessionHas('user', 'faiz');

    }

    // test login for user
    public function testLoginForUserAlreadyLogin()
    {
        $this->withSession([
            'user' => 'faiz'
        ])->post('/login', [
            'user' => 'faiz',
            'password' => 'rahasia'
        ])->assertRedirect('/');
    }

    //login validation
    public function testLoginValidationError()
    {
        $this->post('/login', [])
        ->assertSeeText('User or Password is required');
    }

      // login failed
      public function testLoginFailed()
      {
          $this->post('/login', [
              'user' => 'wrong',
              'password' =>' wrong'
          ])->assertSeeText('User or password is wrong');
      }

      //logout
      public function testLogout()
      {
        $this->withSession([
            'user' => 'faiz'
        ])->post('/logout')->assertRedirect('/')->assertSessionMissing('user');
      }

      //logout for guest
      public function testLogoutGuest()
      {
        $this->post('/logout')->assertRedirect('/');
      }
}
