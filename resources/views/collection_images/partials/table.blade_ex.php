@section('table')
    <table class="table table-dark table-striped" id="collections">
        <thead>
            <tr>
                <th scope="col">#Id</th>
                <th scope="col">{{ __('collections.product_id') }}</th>
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
        @foreach ($products as $product)
            @foreach ($product->collections as $collection)
                <tr>
                    <th scope="row">{{$collection->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$collection->name}}</td>
                    <td>{{$collection->slug}}</td>
                    <td>{{$collection->description}}</td>
                    <td>@if($collection->active) {{__('collections.active')}} @else {{__('collections.inactive')}} @endif</td>
                    <td><img src="{{$collection->image_path}}" class="small-img mb-6 shadow-xl text-dark"
                        alt="{{$collection->image_path}}" /></td>
                    <td>{{$collection->created_at}}</td>
                    <td>{{$collection->updated_at}}</td>
                    @can('is-admin')
                    <td>
                        <a class="btn btn-sm btn-primary quicksand"
                            href="{{route('collections.edit',$collection->slug)}}" role="button">
                            {{__('collections.edit')}}
                        </a>
                        @if($collection->active)
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

        @endforeach
        </tbody>
    </table>
    @if($paginate)
    {{$products->links()}}
    @endif
@endsection
