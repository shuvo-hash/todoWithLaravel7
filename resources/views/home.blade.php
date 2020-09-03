@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                {{-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
     
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}


            <div class="card-body">

                {{-- @include('layouts.flash') --}}
                <x-alert/>
   
                <form action="/upload" method="post" enctype="multipart/form-data">
                    @csrf
                <input type="file" name="image"  >
                <input type="submit" value="Upload" >
                
            </form>

            

            </div>
            
        </div>
        <div class="flex justify-center">
            <a class="text-decoration-none btn btn-md btn-outline-secondary my-5" href="/todo">View Tasks</a>
        </div>
        
    </div>
    

</div>
@endsection
