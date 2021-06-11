@extends('main')

@section('content')
<div class="container">
    @auth
    <h1>{{__('messages.welcome_part_1')}}<strong>{{ Auth::user()->username }}</strong>{{__('messages.welcome_part_2')}}</h1>
    @else
    <h1>{{__('messages.welcome_part_1')}}{{__('messages.welcome_part_2')}}</h1>
    @endif
    @endsection
</div>
