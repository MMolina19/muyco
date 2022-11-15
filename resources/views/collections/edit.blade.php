@extends('main')

@section('content')
<div class="container">

    <div class="row">
        <div class="container">
            <h1 class="float-left">{{__('collections.title')}}</h1>
            <a class="btn btn-sm btn-success float-right mt-0 mb-3"
                    href="{{route( __('urls.collections') )}}" role="button">
                    {{__('collections.back')}}
            </a>
        </div>
    </div>

    <div class="row">
        <div class="container">
            <h3><strong class="raleway float-left">{{__('collections.edit-title')}}</strong></h3>
        </div>
    </div>

    <div class="row">
        <div class="container">
            <div class="card-light p-3">

                <div class="container">
                    <ul class="nav nav-pills nav-fill mt-3 mb-3 text-dark">
                        <li class="nav-item">
                        <a class="nav-link active" href="#product-data" id="product-data-link">Product data</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#product-images" id="product-images-link">Images</a>
                        </li>
                    </ul>
                </div>

                <div class="container">
                    <div class="row card-light p-3" id="product-data">
                        <form method="POST"
                            action="{{ route( trans('urls.collections.update'), ['producto'=> $product->slug, 'coleccion' =>  $collection->slug] ) }}"
                            enctype="multipart/form-data">
                            @method('PATCH')

                            @include('collections.partials.form',['create' => false, 'update'=> true])
                        </form>
                    </div>

                    <div class="row card-light p-3 hideDiv" id="product-images">
                        <form method="POST"
                            action="{{ route( trans('urls.collections.images.update'), ['producto'=> $product->slug, 'coleccion' =>  $collection->slug] ) }}"
                            enctype="multipart/form-data">
                            @method('PATCH')

                            <div class="col-5 mt-4 mb-4 text-light text-center">
                                <div class="card card-raised border-top border-4 border-primary h-100">
                                    <label for="cover" class="form-label text-light">{{__('collections.product-cover-image-input')}}</label>

                                    @if($collection->cover == null)
                                        <img src="{{asset("images/no-image.jpg")}}"
                                            id="preview-cover-before-upload"
                                            class="card-img-top"
                                            alt="{{trans('collections.no-image')}}">
                                    @else
                                        <img src="{{asset($collection->cover_url.$collection->cover)}}"
                                            id="preview-cover-before-upload"
                                            class="card-img-top"
                                            alt="{{asset($collection->cover_url.$collection->cover)}}">
                                    @endif
                                    <div class="card-body w-100">
                                        <h5 class="card-title">{{trans('collections.cover')}}</h5>
                                        <input type="file"
                                            class="input-file"
                                            name="cover" id="cover" />
                                    </div>

                                    @error('cover')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cover') }}</strong>
                                        </span>
                                    @enderror

                                </div>

                            </div>

                            <div class="form-input mt-3">
                                <button type="submit" class="btn btn-primary signup w-100 mt-10">
                                    @if($create)
                                    {{__('collections.create')}}
                                    @else
                                    {{__('collections.update')}}
                                    @endif
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
