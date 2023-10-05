@extends('app')

@section('content')  
<div class="text-center m-5">

    <form method="POST" action="/createmember">
       
        @csrf
            <h1>New Member Form</h1>
            <div class="d-flex justify-content-center">
                <div class="m-3">
                    <input class="mt-4" type="text" placeholder="First Name" name="fname"><br>
                    @error('fname')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                    
                    <input class="mt-4" type="text" placeholder="Last Name" name="lname"><br>
                    @error('lname')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                    
                    <input class="mt-4" type="text" placeholder="Phone Number" name="phone"><br>        
                    @error('phone')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                    
                    <input class="mt-4" type="text" placeholder="Email Address" name="email"><br>        
                    @error('email')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="m-3 justify-content-center">
                    <input class="mt-4" type="text" placeholder="Street Number" name="streetnum"><br>        
                    @error('streetnum')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                    
                    <input class="mt-4" type="text" placeholder="Street Name" name="streetname"><br>        
                    @error('streetname')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                    
                    <input class="mt-4" type="text" placeholder="City" name="city"><br>        
                    @error('city')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                    
                    <input class="mt-4" type="text" placeholder="Province" name="province"><br>        
                    @error('province')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>

        <button class="bg-dark text-white mb-4 mt-4 ps-3 px-3 p-1 fs-4 rounded-2">Register Member</button>

    </form>
</div>    

@endsection