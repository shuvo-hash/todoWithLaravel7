<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Todo;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{

    // this construct is to add authentication in all the function down below
    //this middleware can also use as only and and except method like : $this->middleware('auth')->except('index');
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $todos = auth()->user()->todos->sortBy('completed');

        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoCreateRequest $request)
    {

        //first way to make validation:

        // $rules = [
        //     'title' => 'required|max:255',
        // ];

        // $messages = [
        //     'title.max' => 'To-do can not be greater than 255 chars',
        // ];

        // $validator = Validator::make($request->all(), $rules, $messages);



        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        //second way to make validation:

        // $request->validate([
        //     'title' => 'required|max:255',
        // ]);


        $userid = auth()->id();
        $request['user_id'] = $userid;

        Todo::create($request->all());

        return  redirect(route('todo.index'))->with('message', 'Todo successfully created');
    }

    public function edit(Todo $todo)
    {
        // $todo = Todo::find($id);

        // dd($todo->title);



        return view('todos.edit', compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo)
    {
        $todo->update(['title' => $request->title]);
        $todo->update(['description' => $request->description]);

        return redirect(route('todo.index'))->with('message', 'Succesfully Updated !');
    }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', 'Task Marked as Completed!');
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', 'Task Marked as incompleted!');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back()->with('message', 'Task Deleted!');
    }
}
