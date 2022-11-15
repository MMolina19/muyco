@extends('main')

@section('content')

<div class="row gx-5">
    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item ">
                    <a href="{{route(trans('urls.home'))}}" class="text-decoration-none">
                        {{trans('navigation.home')}}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route(trans('urls.users'))}}" class="text-decoration-none">
                        {{trans('navigation.users')}}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{trans('urls.my-profile')}}
                </li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <div class="row gutters-sm border-right">
            <div class="col-md-4 mb-3">

                @include('users.partials.user-card')

                @include('users.partials.add-user-social-media')

            </div>

            <div class="col-md-8">
                @include('users.partials.add-user-contact-data')

                <hr>

                @include('users.partials.add-user-location')

            </div>
        </div>

    </div>
</div>

@endsection
