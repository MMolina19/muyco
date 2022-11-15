@extends('main')

@section('content')
<div class="container">
    <div class="row">
        <div class="card-header">
            <h3>
                <strong class="raleway float-left">
                    {{ $product->name }} -
                    @foreach($product->collections as $collection)
                        {{ $collection->name }}
                    @endforeach
                </strong>
            </h3>
        </div>
        <div class="col-12">
            <h1 class="float-left">{{__('images.title')}} <span class="badge bg-secondary">{{$imagesCollectionCount}}</span></h1>
            <a class="btn btn-sm btn-success float-right"
                href="{{route(__('urls.collections'))}}"
                role="button">
                {{__('collections.back')}}
            </a>
        </div>
    </div>

    <div class="row">
        <form method="POST" action="{{ route(__('urls.collection.images.store')) }}"
            enctype="multipart/form-data"> <!-- elemento del form enctype="multipart/form-data" para permitir enviar imagenes -->

            @csrf
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @foreach ($collection->images as $img)
                <div class="col">
                    <div class="card shadow-sm">
                        <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                            src="{{asset($img->url)}}" />
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="card-text">{{__('collections.image')}}: {{$img->name}}</p>
                            </div>

                            <div class="card-footer">
                                <div class="form-group">

                                    <a type="button" class="btn btn-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="/editar/{{$img->id}}">
                                        {{__('collections.edit')}}
                                    </a>
                                    <a type="button" class="btn btn-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="/eliminar/{{$img->id}}">
                                        {{__('collections.delete')}}
                                    </a>
                                    <small class="text-muted">{{__('collections.created_at')}}:
                                        {{$img->created_at}}
                                    </small>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </form>

        <form method="POST" action="{{ route(__('urls.collection.images.store')) }}"
            enctype="multipart/form-data">

            @csrf
            <div class="row mt-4">
                <div class="card-header">
                    <h3>
                        <strong class="raleway float-left">
                            {{__('images.add-image')}}
                        </strong>
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-5 card-light p-3">
                    <div class="flex align-items-center imgUp">
                        <div class="imagePreview mr-7"></div>
                        <label class="btn btn-primary">
                            {{__('images.upload')}}

                            <input class="uploadFile img" name="image_path[]" type="file"
                                value="{{__('images.upload')}}" accept="image/*"
                                style="width: 0px;height: 0px;overflow: hidden;" />
                        </label>
                    </div><!-- col-2 -->
                    <i class="fa fa-plus imgAdd mb-7"></i>
                </div>
                <div class="col-7 card-light p-3">

                        <ul class="list-group">
                            @if ($product)
                            <li class="list-group-item active" aria-current="true">
                                <strong>{{__('products.title')}}:</strong>
                                {{$product->name}}
                                <input id="product_id" type="hidden" class="form-control {{ $errors->has('product_id') ? ' is-invalid' : '' }}"
                                name="product_id" value="@isset($product->id){{ $product->id }}@endisset">

                                <input id="product_name" type="hidden" class="form-control {{ $errors->has('product_name') ? ' is-invalid' : '' }}"
                                name="product_name" value="@isset($product->name){{ $product->name }}@endisset">

                                <input id="product_slug" type="hidden" class="form-control {{ $errors->has('product_slug') ? ' is-invalid' : '' }}"
                                name="product_slug" value="@isset($product->slug){{ $product->slug }}@endisset">
                            </li>
                            @endif
                            @foreach($product->collections as $collection)

                            <li class="list-group-item">
                                <input id="collection_id" type="hidden" class="form-control {{ $errors->has('collection_id') ? ' is-invalid' : '' }}"
                                name="collection_id" value="@isset($collection){{ $collection->id }}@endisset">

                                <strong>{{__('collections.title')}}:</strong>
                                {{$collection['name']}}
                                <input id="name" type="hidden" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                name="collection_name" value="@isset($collection){{ $collection->name }}@endisset">
                            </li>
                            <li class="list-group-item">
                                <strong>{{__('collections.slug')}}:</strong>
                                {{$collection['slug']}}
                            <input id="slug" type="hidden" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}"
                                name="collection_slug" value="@isset($collection){{ $collection->slug }}@endisset">
                            </li>
                            <li class="list-group-item">
                                <strong>{{__('collections.description')}}:</strong> {{$collection['description']}}</li>
                            <li class="list-group-item">
                                <strong>{{__('collections.amount')}}:</strong> {{$collection['amount']}}</li>
                            <li class="list-group-item">
                                <strong>{{__('collections.created_at')}}:</strong> {{$collection['created_at']}}</li>
                            <li class="list-group-item">
                                <strong>{{__('collections.updated_at')}}:</strong> {{$collection['updated_at']}}</li>

                            @endforeach
                        </ul>


                </div>
                <div class="card-footer float-right">
                    <input name="counter" value="1" />
                    <button type="submit" id="upload_form" class="btn btn-primary signup float-right">
                        @if($create)
                        {{__('collections.add-images')}}
                        @else
                        {{__('collections.update')}}
                        @endif
                    </button>
                </div>
            </div>

        </form>
    </div>

</div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{URL::asset('js/images.js')}}"></script>
@stop
