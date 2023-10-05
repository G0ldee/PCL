
@extends('app')

@section('content')
    <Div>
    <h1>Home</h1><br>
    
  
        <p class="col-2">Welcome {{$name}}</p>        
    

    <p>USERS:{{$users->count()}}</p>
    <p>MEMBERS:{{$members->count()}}</p>
    <p>DOCUMENTS:{{$docs->count()}}</p>
    <p>REQUESTS:{{$requests->count()}}</p>
    <p>LOANS:{{$loans->count()}}</p>
    <p>Transactions:{{$transactions->count()}}</p>
    
</Div>
@endsection
