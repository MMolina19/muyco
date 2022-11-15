@extends('main')

@section('title',__('products.title'))

@section('content')

<div class="row gx-5">

    <div class="pagetitle">
        <h1>{{__('products.title')}}</h1>
        <nav class="float-left">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{__('urls.home')}}">{{__('home.title')}}</a>
                </li>
                <li class="breadcrumb-item active">{{__('products.title')}}</li>
            </ol>
        </nav>

    </div>
    <section class="section {{ __('products.slug') }}">
        <div class="row">
            <div class="col-lg-8">

                <div class="card">
                    @can('is-admin')
                    <a class="btn btn-sm btn-success float-right mt-2 mb-2"
                    href="{{route('products.create')}}" role="button">
                        {{__('products.create')}}
                    </a>
                    @endcan
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#Id</th>
                                <th scope="col">{{ __('products.name') }}</th>
                                <th scope="col">{{ __('products.active') }}</th>
                                <th scope="col">{{ __('products.created_at') }}</th>
                                <th scope="col">{{ __('products.updated_at') }}</th>
                                @can('is-admin')
                                <th scope="col">{{ __('products.actions') }}</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{$product->id}}</th>
                                <td>{{trans($product->name)}}</td>
                                <td>{{$product->active}}</td>
                                <td>{{$product->created_at}}</td>
                                <td>{{$product->updated_at}}</td>
                                @can('is-admin')
                                <td>
                                    <div class="d-grid gap-2">
                                        <a class="btn btn-sm btn-primary quicksand"
                                            href="{{route(trans('urls.products.edit'),$product->id)}}" role="button">
                                            <i class="bi bi-pencil-square"></i>
                                            <!-- {{__('products.edit')}} -->
                                        </a>
                                        @if($product->active)
                                            <form id="delete-product-{{$product->id}}"
                                                    action="{{route(trans('urls.products.delete'), $product->id)}}"
                                                    method="POST" style="display: none;">
                                                @csrf
                                                @method("DELETE")
                                            </form>
                                            <button class="btn btn-sm btn-danger quicksand"
                                    onclick="event.preventDefault();document.getElementById('delete-product-{{$product->id}}').submit();">
                                            <i class="bi bi-trash"></i>
                                            <!-- {{__('products.delete')}} -->

                                            </button>
                                        @else
                                            <form id="activate-product-{{$product->id}}"
                                                    action="{{route(trans('urls.products.update'), $product->id)}}"
                                                    method="POST" style="display: none;">
                                                @csrf
                                                <input type="hidden" name="activate" value="true">
                                                @method("PATCH")
                                            </form>
                                            <button class="btn btn-sm btn-success quicksand"
                                                    onclick="event.preventDefault();document.getElementById('activate-product-{{$product->id}}').submit();" >
                                                    {{__('products.activate')}}</button>
                                        @endif
                                    </div>
                                </td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$products->links()}}
                </div>
            </div>
            <div class="col-lg-4">
                <!-- @include('products.partials.recent-activity') -->
            </div>

        </div>


    </section>
</div>
@endsection
