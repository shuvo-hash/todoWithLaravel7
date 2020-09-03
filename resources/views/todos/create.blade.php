@extends('todos.layout')

@section('content')

<h1 class="text-2xl border-b border-secondary p-3">What next you need to-do !</h1>
<x-alert/>
<form action="{{route('todo.store')}}" method="post" class="py-4 ">
    @csrf
    <div class="py-2">
        <input type="text" name="title" placeholder="Title" class="px-4 py-2 border rounded btn btn-light" >
    </div>
    
    <div class="py-3">
        
        <textarea name="description" placeholder="Description" class="px-2 py-2 border rounded btn btn-light" cols="35" rows="7"></textarea>
    </div>
    <div >
        <input type="submit" value="Create" class="px-3 py-2 m-2 border rounded btn btn-light">
    </div>
    
    

</form>   

<a href="{{route('todo.index')}}" class="px-3 m-2 border rounded btn btn-light">Back</a>


@endsection