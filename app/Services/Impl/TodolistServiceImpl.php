<?php

// namespace App\Service\impl;
// use App\Service\TodoListService;

// // use App\Services\TodoListService;

// class TodoListServiceImpl implements TodoListService
// {
//     public function saveTodo(string $id, string $todo): void
//     {
//         if(!Session::exists('todolist')){
//             Session::put('todolist', []);
//         }

//         Seesion::push('todolist', [
//             'id' => $id,
//             'todo' => $todo
//         ]);
//     }

//     public function getTodoList():array
//     {
//         return Session::get('todolist', []);
//     }
// }

namespace App\Services\Impl;

// use App\Models\Todo;
use App\Services\TodolistService;
use Illuminate\Support\Facades\Session;

class TodolistServiceImpl implements TodolistService
{

    public function saveTodo(string $id, string $todo): void
    {
        // $todo = new Todo([
        //     "id" => $id,
        //     "todo" => $todo
        // ]);
        // $todo->save();

        if(!Session::exists('todolist')){
            Session::put('todolist', []);
        }

        Session::push('todolist', [
            'id' => $id,
            'todo' => $todo
        ]);
    }

    // logic mangambil todolist
    public function getTodolist(): array
    {
        // return Todo::query()->get()->toArray();
        return Session::get('todolist', [
        ]);
    }

    // logic menghapus data todolist
    public function removeTodo(string $todoId)
    {
        $todolist = Session::get('todolist');
        dd($todolist);

        foreach ($todolist as $index => $value) {
            if($value["id"] == $todoId){
                // dd($value['id']);
                unset($todolist[$index]);
                break;
            }
        }


        Session::put('todolist', $todolist);

        // $todo = Todo::query()->find($todoId);
        // if($todo != null){
        //     $todo->delete();
        // }
    }
}
