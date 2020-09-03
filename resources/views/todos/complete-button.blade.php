
        @if ($todo->completed)
            <span onclick="event.preventDefault();document.getElementById('form-incomplete-{{$todo->id}}').submit()"><i class="fa fa-check fa-lg text-orange-700 cursor-pointer px-2"></i></span>

            <form style="display: none" id="{{'form-incomplete-'.$todo->id}}" method="post" action="{{route('todo.incomplete',$todo->id)}}">
            
                @csrf
                @method('delete') 
                </form> 
        @else
            <span onclick="event.preventDefault();document.getElementById('form-complete-{{$todo->id}}').submit()"><i class="fa fa-check fa-lg text-gray-500 cursor-pointer px-3"></i></span>

            <form style="display: none" id="{{'form-complete-'.$todo->id}}" method="post" action="{{route('todo.complete',$todo->id)}}">
            
            @csrf
            @method('put') 
            </form> 
        @endif