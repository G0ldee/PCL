@extends('app')
@section('content')
    <div class="text-center m-5">
        <form method="POST" action="/processrequest">
            @csrf
            <h1>Request </h1>
                        
            <select class="mt-4" name="requestid">
                <option value="">Request Id</option>
                @foreach ($requests as $request){
                    <option value="{{$request->Id}}">{{$request->Id}}</option>
                }                
                @endforeach
            </select><br>
            @error('requestid')
            <p class="text-danger text-xs mt-1">{{$message}}</p>
            @enderror

            <select class="mt-4" name="action">
                <option value="">Action</option>
                <option value="accept">Accept</option>
                <option value="reject">Reject</option>
            </select><br>
            @error('action')
            <p class="text-danger text-xs mt-1">{{$message}}</p>
            @enderror
            <button class="bg-dark text-white mb-4 mt-4 ps-3 px-3 p-1 fs-4 rounded-2">Submit</button>
        </form>
    </div>
    <div class="d-flex justify-content-center">
        <a class="m-4 ps-4 px-4 p-3 rounded-3 bg-dark text-light" href="/loanpage">Back</a>
    </div>
    
@endsection