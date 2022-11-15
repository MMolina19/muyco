@extends('dashboard')

@section('content')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3 pb-2 mb-3">
    <a class="btn btn-sm btn-success float-right"
        href="{{route(trans('admin-urls.categories.index'))}}" role="button">
        {{__('categories.back')}}
    </a>
    <div class="card-light">
        <div class="card-header">
                {{__('categories.create-title')}}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route(trans('admin-urls.categories.store')) }}">
                @include('admin.categories.partials.form', ['create' => true])
            </form>
        </div>
    </div>
</div>
@endsection
