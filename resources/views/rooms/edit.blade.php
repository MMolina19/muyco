@extends('main')

@section('content')
<div class="row gx-5">
    <div class="container">
        <a class="btn btn-sm btn-success mb-4 float-right"
            href="{{route(trans('urls.rooms'))}}" role="button">
            {{__('rooms.back')}}
        </a>
    </div>
    <div class="container">
        <div class="card-light">
            <div class="card-header">
                {{__('rooms.edit-title')}}
            </div>
            <div class="card-body">
                <form method="POST"
                    action="{{ route(trans('urls.rooms.update'), $room->id) }}">
                    @method('PATCH')

                    @include('rooms.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
