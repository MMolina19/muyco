@extends('main')

@section('title',__('users.title'))

@section('content')

<div class="row gx-5">
    <div class="container">
        @can('is-admin')
        <a class="btn btn-sm btn-success mb-4 float-right"
        href="{{route(trans('urls.users.create'))}}" role="button">
            {{__('users.create')}}
        </a>
        @endcan
    </div>
</div>
<div class="row gx-5">
    <div class="table-responsive">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#Id</th>
                    <th scope="col">{{ __('users.name') }}</th>
                    <th scope="col">{{ __('users.username') }}</th>
                    <th scope="col">{{ __('users.email') }}</th>
                    <th scope="col">{{ __('users.phone') }}</th>
                    <th scope="col">{{ __('users.active') }}</th>
                    @can('is-admin')
                    <th scope="col">{{ __('users.actions') }}</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->active}}</td>
                    @can('is-admin')
                        <td>
                            <div class="d-grid gap-2">
                                <a class="btn btn-sm btn-primary quicksand"
                                    href="{{route(trans('urls.users.edit'),$user->id)}}" role="button">
                                    {{__('users.edit')}}
                                </a>
                                @if($user->active)
                                    <form id="delete-user-{{$user->id}}"
                                            action="{{route(trans('urls.users.delete'), $user->id)}}"
                                            method="POST" style="display: none;">
                                        @csrf
                                        @method("GET")

                                    </form>
                                        <button class="btn btn-sm btn-danger quicksand"
                        onclick="event.preventDefault();document.getElementById('delete-user-{{$user->id}}').submit();">
                                        {{__('users.delete')}}</button>
                                @else
                                    <form id="activate-user-{{$user->id}}"
                                            action="{{route(trans('urls.users.update'), $user->id)}}"
                                            method="POST" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="activate" value="true">
                                        @method("PATCH")

                                    </form>
                                    <button class="btn btn-sm btn-success quicksand"
                                            onclick="event.preventDefault();document.getElementById('activate-user-{{$user->id}}').submit();" >
                                            {{__('users.activate')}}</button>
                                @endif
                            </div>
                        </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$users->links()}}
    </div>
</div>
@endsection
