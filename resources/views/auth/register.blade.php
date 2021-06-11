@extends('main')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-6">
            <div class="card px-5 py-5">

                <span class="circle"><i class="fas fa-user-cog"></i></span>
                <h1 class="mt-3 raleway">{{__('home.brand')}}</h1>
                <strong class="mt-3 raleway">{{__('register.title')}}</strong>
                <small class="mt-2 text-muted quicksand">{{__('register.paragraph')}}</small>

                @include('auth.form-register')

            </div>
        </div>
    </div>
</div>
@endsection
