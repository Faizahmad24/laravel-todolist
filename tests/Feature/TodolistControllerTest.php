<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistControllerTest extends TestCase
{
    public function testTodolist()
    {
        $this->withSession([
            'user' => 'ahmad',
            'todolist' => [
                [
                    'id' => '1',
                    'todo' => 'faiz'
                ],
                [
                    'id' => '2',
                    'todo' => 'finna'
                ]
            ]
        ])->get('/todolist')->assertSeeText('1')->assertSeeText('faiz')->assertSeeText('2')->assertSeeText('finna');
    }

    //add todolist failed
    public function testAddTodoFailed(){
        $this->withSession([
            'user' => 'faiz',
        ])->post('/todolist', [])->assertSeeText('Todo is required');

    }

    //add todo success
    public function testAddTodoSuccess()
    {
        $this->withSession([
            'user' => 'faiz'
        ])->post('/todolist', [
            'todo' => 'ahmad'
        ])->assertRedirect('/todolist');
    }

    //remove todo
    public function testRemoveTodo()
    {
        $this->withSession([
            'user' => 'ahmad',
            'todolist' => [
                [
                    'id' => '1',
                    'todo' => 'faiz'
                ],
                [
                    'id' => '2',
                    'todo' => 'finna'
                ]
            ]
        ])->post('/todolist/1/delete')->assertRedirect('todolist');
    }
}
