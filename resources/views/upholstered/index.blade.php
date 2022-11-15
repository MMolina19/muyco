@extends('main')

@section('title',__('upholstered.title'))

@section('content')

<div class="row">
    <div class="col-12">
        <h1 class="float-left">{{__('upholstered.title')}}</h1>
        @can('is-admin')
        <a class="btn btn-sm btn-success mb-4 float-right"
        href="{{route(trans('urls.upholstered.create'))}}" role="button">
            {{__('upholstered.create')}}
        </a>
        @endcan
    </div>
    <div class="col-lg-12 text-center">
        <div class="card">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">{{ __('upholstered.name') }}</th>
                        <th scope="col">{{ __('upholstered.active') }}</th>
                        <th scope="col">{{ __('upholstered.created_at') }}</th>
                        <th scope="col">{{ __('upholstered.updated_at') }}</th>
                        @can('is-admin')
                        <th scope="col">{{ __('upholstered.actions') }}</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                @foreach ($upholstered as $upholsteredItem)
                    <tr>
                        <th scope="row">{{$upholsteredItem->id}}</th>
                        <td>{{trans($upholsteredItem->name)}}</td>
                        <td>{{$upholsteredItem->active}}</td>
                        <td>{{$upholsteredItem->created_at}}</td>
                        <td>{{$upholsteredItem->updated_at}}</td>
                        @can('is-admin')
                        <td>
                            <div class="d-grid gap-2">
                                <a class="btn btn-sm btn-primary quicksand"
                                    href="{{route(trans('urls.upholstered.edit'),$upholsteredItem->id)}}" role="button">
                                    {{__('upholstered.edit')}}
                                </a>
                                @if($upholsteredItem->active)
                                    <form id="delete-upholsteredItem-{{$upholsteredItem->id}}"
                                            action="{{route(trans('urls.upholstered.delete'), $upholsteredItem->id)}}"
                                            method="POST" style="display: none;">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                    <button class="btn btn-sm btn-danger quicksand"
                            onclick="event.preventDefault();document.getElementById('delete-upholsteredItem-{{$upholsteredItem->id}}').submit();">
                                        {{__('upholstered.delete')}}</button>
                                @else
                                    <form id="activate-upholsteredItem-{{$upholsteredItem->id}}"
                                            action="{{route(trans('urls.upholstered.update'), $upholsteredItem->id)}}"
                                            method="POST" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="activate" value="true">
                                        @method("PATCH")
                                    </form>
                                    <button class="btn btn-sm btn-success quicksand"
                                            onclick="event.preventDefault();document.getElementById('activate-upholsteredItem-{{$upholsteredItem->id}}').submit();" >
                                            {{__('upholstered.activate')}}</button>
                                @endif
                            </div>
                        </td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$upholstered->links()}}
        </div>
    </div>
</div>
@endsection
