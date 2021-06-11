@extends('main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="float-left">{{__('users.title')}}</h1>
            <a class="btn btn-sm btn-success float-right"
                    href="{{route('admin.users.index')}}" role="button">{{__('users.back')}}</a>

        </div>
    </div>

    <div class="row">
        <h3><strong class="raleway float-left">{{__('users.edit-title')}}</strong></h3>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                @method('PATCH')
                @include('admin.users.partials.form')
            </form>
        </div>
    </div>

</div>
@endsection
