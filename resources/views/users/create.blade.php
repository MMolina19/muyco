@extends('main')

@section('content')
<div class="row gx-5">
    <div class="container p-3">
            <h1 class="float-left">{{__('users.title')}}</h1>
            <a class="btn btn-sm btn-success float-right"
                    href="{{route(trans('urls.users'))}}" role="button">{{trans('users.back')}}</a>
    </div>

    <div class="row">
        <h3><strong class="raleway float-left">{{__('users.create-title')}}</strong></h3>
    </div>

    <div class="col-lg-12">
        <div class="card-light p-3">
            <form method="POST" action="{{ route(trans('urls.users.store')) }}">
                @include('users.partials.form', ['create' => true])
            </form>
        </div>
    </div>

</div>
@endsection
