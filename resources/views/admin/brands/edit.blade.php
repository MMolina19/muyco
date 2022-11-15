@extends('dashboard')

@section('content')
<a class="btn btn-sm btn-success float-right"
    href="{{route(trans('admin-urls.brands.index'))}}" role="button">
    {{__('brands.back')}}
</a>
<div class="card-light">
    <div class="card-header">
        {{__('brands.edit-title')}}
    </div>
    <div class="card-body">
        <form method="POST"
            action="{{ route(trans('admin-urls.brands.update'), $brand->id) }}">
            @method('PATCH')
            <input type="hidden" name="update" value="true">
            @include('brands.partials.form')
        </form>
    </div>
</div>
@endsection
