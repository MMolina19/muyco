@extends('main')

@section('title',__('products_types.title'))

@section('content')

<div class="row gx-5">
    <div class="container">
        <h1 class="float-left">{{__('products_types.title')}}</h1>
        @can('is-admin')
        <a class="btn btn-sm btn-success float-right"
        href="{{route('products_types.create')}}" role="button">
            {{__('products_types.create')}}
        </a>
        @endcan
    </div>
    <div class="container">
        <div class="card">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">{{ __('products_types.name') }}</th>
                        <th scope="col">{{ __('products_types.active') }}</th>
                        <th scope="col">{{ __('products_types.created_at') }}</th>
                        <th scope="col">{{ __('products_types.updated_at') }}</th>
                        @can('is-admin')
                        <th scope="col">{{ __('products_types.actions') }}</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                @foreach ($productTypes as $productType)
                    <tr>
                        <th scope="row">{{$productType->id}}</th>
                        <td>{{trans($productType->name)}}</td>
                        <td>{{$productType->active}}</td>
                        <td>{{$productType->created_at}}</td>
                        <td>{{$productType->updated_at}}</td>
                        @can('is-admin')
                        <td>
                            <div class="d-grid gap-2">
                                <a class="btn btn-sm btn-primary quicksand"
                                    href="{{route(trans('urls.products_types.edit'),$productType->id)}}" role="button">
                                    {{__('products_types.edit')}}
                                </a>
                                @if($productType->active)
                                    <form id="delete-product-{{$productType->id}}"
                                            action="{{route(trans('urls.products_types.delete'), $productType->id)}}"
                                            method="POST" style="display: none;">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                    <button class="btn btn-sm btn-danger quicksand"
                            onclick="event.preventDefault();document.getElementById('delete-product-{{$productType->id}}').submit();">
                                        {{__('products_types.delete')}}</button>
                                @else
                                    <form id="activate-product-{{$productType->id}}"
                                            action="{{route(trans('urls.products_types.update'), $productType->id)}}"
                                            method="POST" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="activate" value="true">
                                        @method("PATCH")
                                    </form>
                                    <button class="btn btn-sm btn-success quicksand"
                                            onclick="event.preventDefault();document.getElementById('activate-product-{{$productType->id}}').submit();" >
                                            {{__('products_types.activate')}}</button>
                                @endif
                            </div>
                        </td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$productTypes->links()}}
        </div>
    </div>
</div>
@endsection
