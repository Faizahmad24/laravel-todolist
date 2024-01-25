<?php

namespace Tests\Feature;

use Tests\TestCase;
// use App\Service\TodoListService;
use App\Services\TodolistService;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodoListServiceTest extends TestCase
{
    // private TodoListService $todoListService;

    // protected function setUp(): void
    // {
    //     parent::setUp();
    //     $this->todoListService = $this->app->make(TodoListService::class);
    // }

    // public function testTodoListNotNull()
    // {
    //     self::assertNotNull($this->todoListService);
    // }

    // public function testSaveTodo()
    // {
    //     $this->todoListService->saveTodo('1', 'faiz');
    //     $todoList = Session::get('todolist');
    //     foreach ($todoList as $value) {
    //         self::assertEquals('1', $value['id']);
    //         self::assertEquals('faiz', $value['todo']);
    //     }
    // }

    // public function testGetTodoListEmpty()
    // {
    //     self::assertEquals([], $this->todoListService->getTodoList());
    // }

    // public function testGetTodoListNotEmpty()
    // {
    //     $expected = [
    //         [
    //             'id' => '1',
    //             'todo' => 'faiz'
    //         ],
    //         [
    //             'id' => '1',
    //             'todo' => 'faiz'
    //         ]
    //     ];

    //     $this->todoListService->saveTodo('1', 'faiz');
    //     $this->todoListService->saveTodo('2', 'ahmad');

    //     self::assertEquals($expected, $this->todoListService->getTodoList());
    // }
    private TodolistService $todolistService;

    protected function setUp():void
    {
        parent::setUp();

        // DB::delete("delete from todos");

        $this->todolistService = $this->app->make(TodolistService::class);
    }

    public function testTodolistNotNull()
    {
        self::assertNotNull($this->todolistService);
    }

    public function testSaveTodo()
    {
        $this->todolistService->saveTodo("1", "faiz");

        $todolist = $this->todolistService->getTodolist();
        foreach ($todolist as $value){
            self::assertEquals("1", $value['id']);
            self::assertEquals("faiz", $value['todo']);
        }
    }

    public function testGetTodolistEmpty()
    {
        self::assertEquals([], $this->todolistService->getTodolist());
    }

    public function testGetTodolistNotEmpty()
    {
        $expected = [
            [
                "id" => "1",
                "todo" => "faiz"
            ],
            [
                "id" => "2",
                "todo" => "Kurniawan"
            ]
        ];

        $this->todolistService->saveTodo("1", "faiz");
        $this->todolistService->saveTodo("2", "Kurniawan");

        // Assert::assertArraySubset($expected, $this->todolistService->getTodolist());
        self::assertEquals($expected, $this->todolistService->getTodoList());
    }

    public function testRemoveTodo()
    {
        $this->todolistService->saveTodo('1', 'Faiz');
        $this->todolistService->saveTodo('2', 'Ahmad');

        self::assertEquals(2, sizeof($this->todolistService->getTodolist()));

        $this->todolistService->removeTodo("3");

        self::assertEquals(2, sizeof($this->todolistService->getTodolist()));

        // $this->todolistService->removeTodo('3');

        // self::assertEquals(2, sizeof($this->todolistService->getTodolist()));


    }
}