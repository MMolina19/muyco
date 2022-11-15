@extends('main')

@section('title',__('rooms.title'))

@section('content')

<div class="row">
    <div class="col-12">
        <h1 class="float-left">{{__('rooms.title')}}</h1>
        @can('is-admin')
        <a class="btn btn-sm btn-success mb-4 float-right"
        href="{{route(trans('urls.rooms'))}}" role="button">
            {{__('rooms.create')}}
        </a>
        @endcan
    </div>
    <div class="col-lg-12 text-center">
        <div class="card">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">{{ __('rooms.name') }}</th>
                        <th scope="col">{{ __('rooms.active') }}</th>
                        <th scope="col">{{ __('rooms.created_at') }}</th>
                        <th scope="col">{{ __('rooms.updated_at') }}</th>
                        @can('is-admin')
                        <th scope="col">{{ __('rooms.actions') }}</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <th scope="row">{{$room->id}}</th>
                        <td>{{__($room->name)}}</td>
                        <td>{{$room->active}}</td>
                        <td>{{$room->created_at}}</td>
                        <td>{{$room->updated_at}}</td>
                        @can('is-admin')
                        <td>
                            <div class="d-grid gap-2">
                                <a class="btn btn-sm btn-primary quicksand"
                                    href="{{route(trans('urls.rooms.edit'),$room->id)}}" role="button">
                                    {{__('rooms.edit')}}
                                </a>
                                @if($room->active)
                                    <form id="delete-room-{{$room->id}}"
                                            action="{{route(trans('urls.rooms.delete'), $room->id)}}"
                                            method="POST" style="display: none;">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                    <button class="btn btn-sm btn-danger quicksand"
                            onclick="event.preventDefault();document.getElementById('delete-room-{{$room->id}}').submit();">
                                        {{__('rooms.delete')}}</button>
                                @else
                                    <form id="activate-room-{{$room->id}}"
                                            action="{{route(trans('urls.rooms.update'), $room->id)}}"
                                            method="POST" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="activate" value="true">
                                        @method("PATCH")
                                    </form>
                                    <button class="btn btn-sm btn-success quicksand"
                                            onclick="event.preventDefault();document.getElementById('activate-room-{{$room->id}}').submit();" >
                                            {{__('rooms.activate')}}</button>
                                @endif
                            </div>
                        </td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$rooms->links()}}
        </div>
    </div>
</div>
@endsection
