@extends('layouts.dashboardHeader')

@section('content')
    <div>
        <p> {{ "Hi  I am " .Auth()->user()->role }}</p>

        <p>My email is {{$email}}</p>

        @if(Auth()->user()->role == 'merchant')
            <p> My merchant id is {{ $MID }}</p>
        @endif

        <p>Change password ?</p>
    </div>
    @endsection