@extends('main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="float-left">{{__('images.title')}}</h1>
            <a class="btn btn-sm btn-success float-right"
                href="{{route(__('urls.collection_images .index'))}}"
                role="button">
                {{__('collections.back')}}
            </a>
        </div>
    </div>

    <div class="row">
        <div class="card-header">
            <h3>
                <strong class="raleway float-left">
                    {{__('images.add-image')}}
                </strong>
            </h3>
        </div>
    </div>

    <div class="row">
        <form method="POST" action="{{ route(__('urls.add-images-to-collection')) }}"
            enctype="multipart/form-data">

            @csrf
            <div class="row">
                <div class="col-5 card-light p-3">

                    <div class="flex align-items-center imgUp">
                        <div class="imagePreview mr-7"></div>
                        <label class="btn btn-primary">
                            {{__('images.upload')}}
                            <input class="uploadFile img" name="image_path[]" type="file" value="{{__('images.upload')}}"
                                style="width: 0px;height: 0px;overflow: hidden;">
                        </label>
                    </div><!-- col-2 -->
                    <i class="fa fa-plus imgAdd mb-7"></i>

                </div>
                <div class="col-7 card-light p-3">

                        <ul class="list-group">
                            <li class="list-group-item active" aria-current="true">
                                <strong>{{__('products.title')}}:</strong>
                                {{$product_name}}
                                <input id="product_name" type="hidden" class="form-control {{ $errors->has('product_name') ? ' is-invalid' : '' }}"
                                name="product_name" value="@isset($product_name){{ $product_name }}@endisset">
                            </li>
                            <li class="list-group-item">
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
