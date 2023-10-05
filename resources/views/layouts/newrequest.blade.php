@extends('app')
@section('content')
<script>
    $(function(){
        $('#datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        });            
    });
</script>
    <div class="text-center m-5">
        <form method="POST" action="/createrequest">
            @csrf
            <h1>Request Loan Form</h1>
                        
            <select class="mt-4" name="memid">
                <option value="">Member Id</option>
                @foreach ($members as $member){
                    <option value="{{$member->Id}}">{{$member->Id}}</option>
                }                
                @endforeach
            </select><br>
            @error('memid')
            <p class="text-danger text-xs mt-1">{{$message}}</p>
            @enderror

            <select class="mt-4" name="docid">
                <option value="">Titles</option>
                @foreach ($docs as $doc){
                    <option value="{{$doc->Id}}">{{$doc->Title}}</option>
                }                
                @endforeach
            </select><br>
            @error('docid')
            <p class="text-danger text-xs mt-1">{{$message}}</p>
            @enderror
            <p class="m-4">Date: <input type="text" name="date" id="datepicker"></p>
            @error('date')
            <p class="text-danger text-xs mt-1">{{$message}}</p>
            @enderror
            <button class="bg-dark text-white mb-4 mt-4 ps-3 px-3 p-1 fs-4 rounded-2">Submit Request</button>
    

        </form>
    </div>
    <div class="d-flex justify-content-center">
        <a class="m-4 ps-4 px-4 p-3 rounded-3 bg-dark text-light" href="/loanpage">Back</a>
    </div>
    
@endsection
