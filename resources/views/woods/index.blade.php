@extends('main')

@section('title',__('woods.title'))

@section('content')

<div class="row">
    <div class="col-12">
        <h1 class="float-left">{{__('woods.title')}}</h1>
        @can('is-admin')
        <a class="btn btn-sm btn-success mb-4 float-right"
        href="{{route(trans('urls.woods'))}}" role="button">
            {{__('woods.create')}}
        </a>
        @endcan
    </div>
    <div class="col-lg-12 text-center">
        <div class="card">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">{{ __('woods.name') }}</th>
                        <th scope="col">{{ __('woods.active') }}</th>
                        <th scope="col">{{ __('woods.created_at') }}</th>
                        <th scope="col">{{ __('woods.updated_at') }}</th>
                        @can('is-admin')
                        <th scope="col">{{ __('woods.actions') }}</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                @foreach ($woods as $wood)
                    <tr>
                        <th scope="row">{{$wood->id}}</th>
                        <td>{{trans($wood->name)}}</td>
                        <td>{{$wood->active}}</td>
                        <td>{{$wood->created_at}}</td>
                        <td>{{$wood->updated_at}}</td>
                        @can('is-admin')
                        <td>
                            <div class="d-grid gap-2">
                                <a class="btn btn-sm btn-primary quicksand"
                                    href="{{route(trans('urls.woods.edit'),$wood->id)}}" role="button">
                                    {{__('woods.edit')}}
                                </a>
                                @if($wood->active)
                                    <form id="delete-wood-{{$wood->id}}"
                                            action="{{route(trans('urls.woods.delete'), $wood->id)}}"
                                            method="POST" style="display: none;">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                    <button class="btn btn-sm btn-danger quicksand"
                            onclick="event.preventDefault();document.getElementById('delete-wood-{{$wood->id}}').submit();">
                                        {{__('woods.delete')}}</button>
                                @else
                                    <form id="activate-wood-{{$wood->id}}"
                                            action="{{route(trans('urls.woods.update'), $wood->id)}}"
                                            method="POST" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="activate" value="true">
                                        @method("PATCH")
                                    </form>
                                    <button class="btn btn-sm btn-success quicksand"
                                            onclick="event.preventDefault();document.getElementById('activate-wood-{{$wood->id}}').submit();" >
                                            {{__('woods.activate')}}</button>
                                @endif
                            </div>
                        </td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$woods->links()}}
        </div>
    </div>
</div>
@endsection
