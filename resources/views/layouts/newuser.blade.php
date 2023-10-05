@extends('app')

@section('content')  
<div class="text-center m-5">

    <form method="POST" action="/createuser">
       
        @csrf
        <h1>New User Form</h1>
        
        <label>{{$user->count()}}</label><br>
        
        <input class="mt-4" type="text" placeholder="First Name" name="fname"><br>
        @error('fname')
        <p class="text-danger text-xs mt-1">{{$message}}</p>
        @enderror
        
        <input class="mt-4" type="text" placeholder="Last Name" name="lname"><br>
        @error('lname')
        <p class="text-danger text-xs mt-1">{{$message}}</p>
        @enderror
        
        <select class="mt-4" name="utype">
            <option value="">Types</option>
            @foreach ($user as $type){
                <option value="{{$type->Type}}">{{$type->Type}}</option>
            }                
            @endforeach
        </select><br>
        @error('utype')
        <p class="text-danger text-xs mt-1">{{$message}}</p>
        @enderror
        
        <input class="mt-4" type="password" placeholder="Password" name="pass"><br>
        @error('pass')
        <p class="text-danger text-xs mt-1">{{$message}}</p>
        @enderror

        <input class="mt-4 mb-4" type="password" placeholder="Confirm Password" name="pass2"><br>
        @error('pass2')
        <p class="text-danger text-xs mt-1">{{$message}}</p>
        @enderror

        <button class="bg-dark text-white mb-4 mt-4 ps-3 px-3 p-1 fs-4 rounded-2">Register User</button>

    </form>
</div>

@endsection