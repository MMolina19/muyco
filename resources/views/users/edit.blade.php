@extends('main')

@section('content')

<div class="row gx-5">
    <div class="container p-3">
        <h1 class="float-left">{{__('users.title')}}</h1>
        <a class="btn btn-sm btn-success float-right"
            href="{{route(trans('urls.users'))}}" role="button">{{__('users.back')}}
        </a>
    </div>
</div>

<div class="row gx-5">
    <div class="container">
        <h3><strong class="raleway float-left mb-3">{{__('users.edit-title')}}</strong></h3>
    </div>

    <div class="container">
        <div class="card-light p-4">
            <form method="POST" action="{{ route(trans('urls.users.update'), $user->id) }}">
                @method('patch')

                @include('users.partials.form')
            </form>
        </div>
    </div>

</div>
@endsection
