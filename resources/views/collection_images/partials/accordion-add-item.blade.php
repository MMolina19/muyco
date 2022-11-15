@section('accordion-item')
@foreach ($collections as $collection)

@foreach ($collection->products as $product)

    <div class="accordion-item text-dark">
        <h2 class="accordion-header" id="heading{{$product->slug}}">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#{{$product->slug}}" aria-expanded="true" aria-controls="{{$product->slug}}">
                @if($product)
                    {{$product->name}}
                @endif
            </button>
        </h2>
        <div id="{{$product->slug}}" class="accordion-collapse collapse show" aria-labelledby="heading{{$product->slug}}"
            data-bs-parent="#accordion{{__('products.title')}}">
            <div class="accordion-body">
                <table class="table table-dark table-striped" id="collections">
                    <thead>
                        <tr>
                            <!--<th scope="col">#Id</th>-->
                            <!--<th scope="col">{{ __('collections.product') }}</th>-->
                            <th scope="col">{{ __('collections.name') }}</th>
                            <th scope="col">{{ __('collections.slug') }}</th>
                            <th scope="col">{{ __('collections.description') }}</th>
                            <th scope="col">{{ __('collections.active') }}</th>
                            <th scope="col">{{ __('collections.images') }}</th>
                            <th scope="col">{{ __('collections.created_at') }}</th>
                            <th scope="col">{{ __('collections.updated_at') }}</th>
                            @can('is-admin')
                            <th scope="col">{{ __('collections.actions') }}</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product->collections as $collection)
                            <tr>
                                <!--<th scope="row">{{$collection->id}}</th>-->
                                <!--<td>{{$product->name}}</td>-->
                                <td>{{$collection->name}}</td>
                                <td>{{$collection->slug}}</td>
                                <td>{{$collection->description}}</td>
                                <td>@if($collection->active) {{__('collections.active')}} @else {{__('collections.inactive')}} @endif</td>
                                <td>

                                    <!--{{$collection->image_path}}-->


                                </td>
                                <td>{{$collection->created_at}}</td>
                                <td>{{$collection->updated_at}}</td>
                                @can('is-admin')
                                <td>
                                    <a class="btn btn-sm btn-primary quicksand"
                                        href="{{route('collections.edit',$collection->slug)}}" role="button">
                                        {{__('collections.edit')}}
                                    </a>
                                    @if($collection->active)
                                            <form id="add-images-{{$collection->slug}}"
                                            action="{{route('images.store')}}"
                                            method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-2 imgUp text-dark">
                                                        <div class="imagePreview"></div>
                                                        <label class="btn btn-primary">
                                                            Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                                        </label>
                                                    </div><!-- col-2 -->
                                                    <i class="fa fa-plus imgAdd"></i>
                                                </div><!-- row -->
                                            </div><!-- container -->


                                        </form>
                                        <button class="btn btn-sm btn-success quicksand"
                                            onclick="event.preventDefault();document.getElementById(add-images-{{$collection->slug}}).submit();" >
                                            {{__('collections.add-images')}}</button>
                                        <button type="button" class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#addImagesModal-{{$product->id}}-{{$collection->id}}">
                                            {{__('collections.add-images')}}
                                        </button>
                                        <form id="delete-collection-{{$collection->id}}"
                                                action="{{route('collections.destroy', $collection->id)}}"
                                                method="POST" style="display: none;">
                                            @csrf
                                            @method("DELETE")
                                        </form>
                                        <button class="btn btn-sm btn-danger quicksand"
                                onclick="event.preventDefault();document.getElementById('delete-collection-{{$collection->id}}').submit();">
                                            {{__('collections.delete')}}</button>
                                    @else
                                        <form id="activate-collection-{{$collection->slug}}"
                                                action="{{route('collections.update', $collection->slug)}}"
                                                method="POST" style="display: none;"
                                                enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="activate" value="true">
                                            @method("PUT")
                                        </form>
                                        <button class="btn btn-sm btn-success quicksand"
                                                onclick="event.preventDefault();document.getElementById('activate-collection-{{$collection->slug}}').submit();" >
                                                {{__('collections.activate')}}</button>
                                    @endif
                                </td>
                                @endcan
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <!--
                @if($paginate)
                {{$products->links()}}
                @endif
                -->

            </div>
        </div>
    </div>

@endforeach

@endforeach
@endsection
