@section('accordion-item')

@if($collections!=null)

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
                                <th scope="col">{{ __('products.name') }}</th>
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
                                    <!--<td>{{$product->id}}</td>-->
                                    <td>{{$product->name}}</td>
                                    <td>{{$collection->name}}</td>
                                    <td>{{$collection->slug}}</td>
                                    <td>{{$collection->description}}</td>
                                    <td>@if($collection->active) {{__('collections.active')}} @else {{__('collections.inactive')}} @endif</td>
                                    <td>
                                        <div class="card" style="width: 15rem;">
                                            <img src="{{ $collection->cover_url . $collection->cover }}" class="card-img-top" alt="{{ $collection->cover }}">
                                                <div class="card-body">
                                                <h5 class="card-title">{{$collection->name}}</h5>
                                                <p class="card-text">{{$collection->description}}</p>
                                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                                </div>
                                            </div>

                                            @foreach ($collection->images as $img)
                                                <img src="{{asset($img->cover_url . $img->cover)}}" class="small-thumbnail" />
                                            @endforeach
                                    </td>
                                    <td>
                                        <span class="d-inline-block cursor-pointer" tabindex="0" data-bs-toggle="popover"
                                            data-bs-trigger="hover focus"
                                            data-bs-content="{{$collection->timePassed($collection->created_at)}}">
                                            <i>{{$collection->created_at}}</i>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="d-inline-block cursor-pointer" tabindex="0" data-bs-toggle="popover"
                                            data-bs-trigger="hover focus"
                                            data-bs-content="{{$collection->timePassed($collection->updated_at)}}">
                                            <i>{{$collection->updated_at}}</i>
                                        </span>
                                    </td>
                                    @can('is-admin')
                                    <td>
                                        <div class="d-grid gap-2">
                                            <a class="btn btn-sm btn-primary quicksand"
                                                href="{{route(trans('urls.collections.edit'),[$product->slug, $collection->slug])}}" role="button">
                                                {{__('collections.edit')}}
                                            </a>
                                            @if($collection->active)

                                                <form id="delete-collection-{{$collection->id}}"
                                                        action="{{route(trans('urls.collections.destroy'), [$product->slug, $collection->slug])}}"
                                                        method="POST" style="display: none;">
                                                    @csrf
                                                    @method("DELETE")
                                                </form>
                                                <a class="btn btn-sm btn-primary btn-danger quicksand"
                                                    onclick="event.preventDefault();document.getElementById('delete-collection-{{$collection->id}}').submit();" role="button">
                                                    {{__('collections.delete')}}
                                                </a>
                                            @else
                                                <form id="activate-collection-{{$collection->slug}}"
                                                        action="{{route(trans('collections.update'),  [$product->slug, $collection->slug])}}"
                                                        method="POST" style="display: none;">
                                                    @csrf
                                                    <input type="hidden" name="activate" value="true">
                                                    @method("PUT")
                                                </form>
                                                <a class="btn btn-sm btn-success quicksand"
                                                    onclick="event.preventDefault();document.getElementById('activate-collection-{{$collection->slug}}').submit();" >
                                                    {{__('collections.activate')}}
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                    @endcan
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    @endforeach

@endforeach

@else
    @foreach ($products as $product)
        {{$product->name}} <br>
            @foreach ($product->collections as $collection)
                {{$collection->name}} <br>
            @endforeach
    @endforeach
@endif

@endsection
