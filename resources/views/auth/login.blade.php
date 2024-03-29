@extends('auth.main')

@section('title',__('login.title'))

@section('content')
<div class="container m-2">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-6">
            <div class="card p-5">

                <!--<span class="circle"><i class="fas fa-user-lock"></i></span>-->
                <div class="spinner-grow text-primary" role="status">
                    <span class="sr-only"></span>
                </div>

                <h1 class="mt-3 raleway">{{__('home.brand')}}</h1>
                <strong class="mt-3 raleway">{{__('login.title')}}</strong>
                <small class="mt-2 text-muted quicksand">{{__('login.paragraph')}}</small>

                @include('auth.form-login')

            </div>
        </div>
    </div>
</div>
@endsection
