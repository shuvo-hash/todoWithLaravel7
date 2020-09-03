@extends('todos.layout')

@section('content')
<div class="flex justify-center border-b border-secondary p-3 m-2">
    <h1 class="text-2xl">All your to-do !</h1>
    <a href="{{route('todo.create')}}" class="btn-block h-100 rounded-xl btn btn-primary col-md-4 mx-3">Create new</a>
</div>

<ul>
    <x-alert/>
    @forelse ($todos as $todo)
    
    <li class="flex justify-between p-3 " style="font-weight: bold">

        <div>
            @include('todos.complete-button')    
        </div>

        @if ($todo->completed)
        <p class="m-2 text-orange-600 line-through">{{$todo->title}}</p>
        @else
        <a class="m-2  text-decoration-none text-orange-600 " href="{{route('todo.show',$todo->id)}}">{{$todo->title}}</a>
            
        @endif

        <div class="mt-2">
            <a href="{{route('todo.edit',$todo->id)}}" class="btn btn-success"><i class="fa fa-pencil " ></i></a>
            

            <span onclick="event.preventDefault();
                            if(confirm('Are you sure want to delete this ?')){
                                
                                document.getElementById('form-delete-{{$todo->id}}').submit()}">
                                <i class="fa fa-trash fa-lg text-red-500 text-2xl cursor-pointer px-3"></i></span>

            <form style="display: none" id="{{'form-delete-'.$todo->id}}" method="post" action="{{route('todo.destroy',$todo->id)}}">
                @csrf
            @method('delete') 
            </form> 

    </div>

    @empty
    
    <p>Todo list is empty, create a new one</p>

    </li>
    @endforelse
</ul>  
@endsection




    
