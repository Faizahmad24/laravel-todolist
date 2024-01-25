<?php
// namespace App\Service;

// interface TodoListService
// {
//     public function saveTodo(string $id, string $todo): void;

//     //memgambil datya todo
//     public function getTodoList():array;

// }
namespace App\Services;

interface TodolistService
{

    public function saveTodo(string $id, string $todo): void;

    public function getTodolist(): array;

    public function removeTodo(string $todoId);

}
