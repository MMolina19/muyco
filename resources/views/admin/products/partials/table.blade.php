<div class="table-responsive">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th class="text-center"> # </th>
                <th class="text-center"> {{__('products.category')}} </th>
                <th class="text-center"> {{__('products.brand')}} </th>
                <th class="text-center"> {{__('products.model')}} </th>
                <th class="text-center"> {{__('products.description')}} </th>
                <th class="text-center"> {{__('products.stock')}} </th>
                <th class="text-center"> {{__('products.price')}} </th>
                <th class="text-center"> {{__('products.sale_price')}} </th>
                <th class="text-center"> {{__('products.featured')}} </th>
                <th class="text-center"> {{__('products.status')}} </th>
                <th class="text-center"> {{__('products.images')}} </th>
                @can('is-admin')
                <th scope="col" class="text-center text-danger">
                    <i class="fa fa-bolt"> </i> {{ __('products.actions') }}</th>
                @endcan
            </tr>
        </thead>
        <tbody>
        @forelse ($products as $product)
            <tr>
                <td class="text-center">{{ $product->id }}</td>
                <td class="text-center">{{ $product->category->name }}</td>
                <td class="text-center">{{ $product->brand->name }}</td>
                <td class="text-center">{{ $product->model }}</td>
                <td class="text-center">{{ $product->description }}</td>
                <td class="text-center">{{ $product->stock }}</td>
                <td class="text-center">$
                    {{ $product->prices->sortByDesc('id')->first()->price }}
                </td>
                <td class="text-center">$
                    {{ $product->prices->sortByDesc('id')->first()->sale_price }}
                </td>
                <td class="text-center">
                    @if ($product->featured)
                        <span class="badge badge-success">{{__('products.featured')}}</span>
                    @else
                        <span class="badge badge-danger">{{__('products.unfeatured')}}</span>
                    @endif
                </td>
                <td class="text-center">
                    @if ($product->active == 1)
                        <span class="badge badge-success">{{__('products.active')}}</span>
                    @else
                        <span class="badge badge-danger">{{__('products.inactive')}}</span>
                    @endif
                </td>
                <td class="text-center">
                    {{ $product->images->count() }}
                    <!-- <a href="#" class="btn btn-otuline-primary text-light">
                        {{ __('products.view') }}
                    </a> -->
                    @if( isset($product->images) )
                        @foreach ($product->images as $image)
                            <img
                                src="{{ asset($image->url.$image->name.$image->extension) }}"
                                class="img-responsive"
                                style="max-height:100px; max-width:100px;"
                                alt="{{$image->name}}"
                            />
                        @endforeach
                    @endif
                </td>
                @can('is-admin')
                <td class="text-center col-1">
                    <div class="d-grid gap-2">
                        <a class="btn btn-sm btn-primary quicksand"
                            href="{{ route(trans('admin-urls.products.edit'),$product->id) }}" role="button">
                            {{__('products.edit')}}
                        </a>
                        @if($product->active)
                            <form id="delete-product-{{$product->id}}"
                                    action="{{route(trans('admin-urls.products.destroy'), $product->id)}}"
                                    method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="deactivate" value="true">
                                @method("PUT")
                            </form>
                            <button class="btn btn-sm btn-danger quicksand"
                    onclick="event.preventDefault();document.getElementById('delete-product-{{$product->id}}').submit();">
                                {{__('products.delete')}}</button>
                        @else
                            <form id="activate-product-{{$product->id}}"
                                    action="{{route(trans('admin-urls.products.update'), $product->id)}}"
                                    method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="activate" value="true">
                                @method("PUT")
                            </form>
                            <button class="btn btn-sm btn-success quicksand"
                                    onclick="event.preventDefault();document.getElementById('activate-product-{{$product->id}}').submit();" >
                                    {{__('products.activate')}}</button>
                        @endif
                    </div>
                </td>
                @endcan
            </tr>
        @empty
            <tr>
                <td colspan="10" class="text-center">{{ trans('products.no_records_yet') }}</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{$products->links()}}
</div>
