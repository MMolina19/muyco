@extends('main')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12">
            <h1 class="float-left">{{__('collections.title')}}</h1>
            <a class="btn btn-sm btn-success float-right"
                    href="{{route('collections.index')}}" role="button">
                    {{__('collections.back')}}
            </a>
        </div>
    </div>

    <div class="row">
        <h3>
            <strong class="raleway float-left">
                {{__('collections.edit-title')}}
            </strong>
        </h3>
    </div>

    <div class="col-lg-12">
        <div class="card-light px-3">

            <form method="POST"
                action="{{ route('collections.update',$collection->slug) }}"
                enctype="multipart/form-data">
                @method('PATCH')
                @include('collection_images.partials.form',['create' => false, 'update'=> true])
            </form>
        </div>
    </div>

</div>
@endsection
