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
                {{__('designs_types.edit-title')}}
            </div>
            <div class="card-body">
                <form method="POST"
                    action="{{ route(trans('urls.designs_types.update'), $designtype->id) }}">
                    @method('PATCH')

                    @include('designs_types.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
