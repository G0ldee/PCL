@extends('app')
@section('content')
<div>
    <div class="d-flex justify-content-center">
        <h3 class="mt-4 p-3">Loan Options:</h3>
    </div>
    <div class="d-flex justify-content-center">
        <br><a class="m-4 p-3 rounded-3 bg-dark text-light"href="/newrequest">New Request</a>
        <a class="m-4 ps-4 px-4 p-3 rounded-3 bg-dark text-light" href="/newloan">Make Loan</a>
    </div>
    <div class="d-flex justify-content-center">
        <a class="m-4 p-3 btn-lg rounded-3 bg-dark text-light" href="/processrequestpage">Manage Loans</a>
        <a class="m-4 p-3 rounded-3 bg-dark text-light" href="/returnform">Make Return</a>
    </div>
    
</div>
@endsection