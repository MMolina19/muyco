@extends('main')

@section('content')
<div class="row gx-5">
    <div class="container p-3">
            <h1 class="float-left">{{__('collections.title')}}</h1>
            <a class="btn btn-sm btn-success float-right"
                href="{{route(__('urls.collections'))}}"
                role="button">
                {{__('collections.back')}}
            </a>
    </div>

    <div class="container p-3">
        <h3>
            <strong class="raleway float-left">
                {{__('collections.create-title')}}
            </strong>
        </h3>
    </div>
    <div class="col-lg-12">
        <form method="POST" action="{{ route(trans('urls.collections.store')) }}"
            enctype="multipart/form-data">
            @include('collections.partials.form', ['create' => true, 'update'=> false])
        </form>
    </div>

</div>
@endsection
