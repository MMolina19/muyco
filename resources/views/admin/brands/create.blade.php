@extends('dashboard')

@section('content')
<div class="row">
    <div class="btn-toolbar mb-2 mb-md-0 float-right">
        <a class="btn btn-sm btn-success float-right"
            href="{{route(trans('admin-urls.brands.index'))}}" role="button">
            {{__('brands.back')}}
        </a>
    </div>
    <div class="card-light">
        <div class="card-header">
                {{trans('brands.create-title')}}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route(trans('admin-urls.brands.store')) }}">
                @include('admin.brands.partials.form', ['create' => true])
            </form>
        </div>
    </div>
</div>
@endsection
