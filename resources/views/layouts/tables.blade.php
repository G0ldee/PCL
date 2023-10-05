@extends('app')
@section('content')
<!--
<div class="mb-5">
    <x-search-bar :details="$details"/>
</div>
-->
<div class="inline overflow-auto">

        @livewireStyles
            <livewire:loans-table>
        @livewireScripts 
    </div>

@endsection