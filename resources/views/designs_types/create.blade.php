@extends('main')

@section('content')
<div class="row gx-5">
    <div class="container">
        <a class="btn btn-sm btn-success mb-4 float-right"
            href="{{route(trans('urls.designs_types'))}}" role="button">
            {{__('designs_types.back')}}
        </a>
    </div>
    <div class="container">
        <div class="card-light">
            <div class="card-header">
                    {{__('designs_types.create-title')}}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route(trans('urls.designs_types.store')) }}">
                    @include('designs_types.partials.form', ['create' => true])
                </form>
            </div>
        </div>
    </div>
@endsection
