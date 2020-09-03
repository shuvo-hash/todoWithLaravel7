@extends('todos.layout')

@section('content')

<div class="py-4 "> 
<h1 class="text-2xl border-b border-secondary p-3">{{$todo->title}}</h1>


    
    <div class="p-2 m-4">
        <div>
            <p>{{$todo->description}}</p>
        </div>
    </div>

</div>



<a href="{{route('todo.index')}}" class="px-3 m-2 border rounded btn btn-light">Back</a>


@endsection