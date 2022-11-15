@extends('main')

@section('content')
<div class="row gx-5">
    <div class="container">
        <a class="btn btn-sm btn-success mb-4 float-right"
            href="{{route(trans('urls.woods'))}}" role="button">
            {{__('woods.back')}}
        </a>
    </div>
    <div class="container">
        <div class="card-light">
            <div class="card-header">
                    {{__('woods.create-title')}}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route(trans('urls.woods.store')) }}">
                    @include('woods.partials.form', ['create' => true])
                </form>
            </div>
        </div>
    </div>
@endsection
