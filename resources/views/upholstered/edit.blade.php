@extends('main')

@section('content')
<div class="row gx-5">
    <div class="container">
        <a class="btn btn-sm btn-success mb-4 float-right"
            href="{{route(trans('urls.upholstered'))}}" role="button">
            {{__('upholstered.back')}}
        </a>
    </div>
    <div class="container">
        <div class="card-light">
            <div class="card-header">
                {{__('upholstered.edit-title')}}
            </div>
            <div class="card-body">
                <form method="POST"
                    action="{{ route(trans('urls.upholstered.update'), $upholstered->id) }}">
                    @method('PATCH')

                    @include('upholstered.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
