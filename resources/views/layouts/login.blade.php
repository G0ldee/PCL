@extends('app')

@section('content')  
<div class="text-center m-5">

    <form method="POST" action="/home">
       
        @csrf
        <h1>Login</h1>
        
        <label>{{$user->count()}}</label><br>
        <label>{{$message}}</label><br>
        <input class="mt-4" type="text" placeholder="UserId" name="userid"><br>

        <input class="mt-2 mb-4" type="password" placeholder="Password" name="password"><br>

        @error('userid')
        <p class="text-danger text-xs mt-1">{{$message}}</p>
        @enderror
        @error('password')
            <p class="text-danger text-xs mt-1">{{$message}}</p>
        @enderror

        <button class="bg-dark text-white ps-3 px-3 p-1 fs-4 rounded-2">Sign in</button>

    </form>
</div>

@endsection