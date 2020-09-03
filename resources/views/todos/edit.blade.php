@extends('todos.layout')

@section('content')
<h1 class="text-2xl border-b border-secondary p-3">Update to-do !</h1>
<x-alert/>
<form action="{{route('todo.update',$todo->id)}}" method="post" class="py-4">
    @csrf
    @method('patch')
 
    <div class="py-2">
        <input type="text" name="title" value="{{$todo->title}}"  class="px-4 py-2 border rounded btn btn-light" >
    </div>
    
    <div class="py-3">
        
        <textarea name="description" class="px-2 py-2 border rounded btn btn-light" cols="35" rows="7">{{$todo->description}}</textarea>
    </div>
    <div >
        <input type="submit" value="Update" class="px-3 py-2 m-2 border rounded btn btn-light">
    </div>
    
</form>   
<a href="{{route('todo.index')}}" class="px-3 m-2 border rounded btn btn-light">Back</a>

    
@endsection