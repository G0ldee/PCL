@extends('app')
@section('content')
    <div class="text-center m-5">
        <form method="POST" action="/returndoc">
            @csrf
            <h1>Return Form </h1>             
            <select class="mt-4" name="loanid">
                <option value="">Loan Id</option>
                @foreach ($loans as $loan){
                    <option value="{{$loan->Id}}">{{$loan->Id}}</option>
                }                
                @endforeach
            </select><br></p>
            @error('loanid')
            <p class="text-danger text-xs mt-1">{{$message}}</p>
            @enderror

            <button class="bg-dark text-white mb-4 mt-4 ps-3 px-3 p-1 fs-4 rounded-2">Return</button>
        </form>
    </div>
    <div class="d-flex justify-content-center">
        <a class="m-4 ps-4 px-4 p-3 rounded-3 bg-dark text-light" href="/loanpage">Back</a>
    </div>
    
@endsection