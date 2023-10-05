@extends('app')
@section('content')

<div class="mb-5">
    <x-search-bar :details="$details"/>
</div>
<div class="inline overflow-auto">

        @unless(count($docs) == 0)
        @foreach ($docs as $doc)
            @php
                #array_push( $details,'docs'->$docs, 'docinfos'->$docinfos);
                $docinfo = $docinfos->firstorfail('Id', $doc->DocInfo);
                $type = $details['types']->firstorfail('Id', $doc->Type);
                $cat = $details['categories']->firstorfail('Id', $doc->Category);
                $genre = $details['genres']->firstorfail('Id', $doc->Genre);
            @endphp
       
            <div class="inline-flex m-2 p-4 rounded-3 bg-secondary text-white">
                <div class="flex">
                    <br><p>Title: {{$docinfo->Title}}, Author: {{$docinfo->Author}}</p>
                    <p>ID: {{$doc->Id}}, Format: {{$cat->Category}}</p>
                </div>             
                <div class="flex">
                    <p>Type: {{$type->Type}}, Genre: {{$genre->Genre}}</p>
                    <p>Year: {{$docinfo->Year}}, ISBN: {{$docinfo->ISBN}}</p>
                    <p>Description: {{$docinfo->Description}}</p><br>
                </div>               
            </div>    
            
                       
        @endforeach
        @else
        <p>Nothing to show</p>
        @endunless
    </div>

@endsection