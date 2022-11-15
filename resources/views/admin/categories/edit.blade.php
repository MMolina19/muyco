@extends('dashboard')

@section('content')
<a class="btn btn-sm btn-success float-right"
    href="{{route(trans('admin-urls.categories.index'))}}" role="button">
    {{__('categories.back')}}
</a>
<div class="card-light">
    <div class="card-header">
        {{__('categories.edit-title')}}
    </div>
    <div class="card-body">
        <form method="POST"
            action="{{ route(trans('admin-urls.categories.update'), $category->id) }}">
            @method('PATCH')
            <input type="hidden" name="update" value="true">
            @include('admin.categories.partials.form')
        </form>
    </div>
</div>
@endsection
