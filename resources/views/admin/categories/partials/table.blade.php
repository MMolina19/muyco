<div class="table-responsive">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">{{__('categories.name')}}</th>
                <th class="text-center">{{__('categories.description')}}</th>
                <th class="text-center">{{__('categories.active')}}</th>
                <th class="text-center">{{__('categories.featured')}}</th>
                @can('is-admin')
                <th scope="col" class="text-center text-danger"><i class="fa fa-bolt"> </i> {{ __('categories.actions') }}</th>
                @endcan
            </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td class="text-center">
                    @if ($category->active == 1)
                        <span class="badge badge-success">{{__('categories.active')}}</span>
                    @else
                        <span class="badge badge-danger">{{__('categories.inactive')}}</span>
                    @endif
                </td>
                <td class="text-center">
                    @if ($category->featured == 1)
                        <span class="badge badge-success">{{__('categories.featured')}}</span>
                    @else
                        <span class="badge badge-danger">{{__('categories.unfeatured')}}</span>
                    @endif
                </td>
                @can('is-admin')
                <td>
                    <div class="d-grid gap-2">
                        <a class="btn btn-sm btn-primary quicksand"
                            href="{{route(trans('admin-urls.categories.edit'),$category->id)}}" role="button">
                            {{__('categories.edit')}}
                        </a>
                        @if($category->active)
                            <form id="delete-category-{{$category->id}}"
                                    action="{{route(trans('admin-urls.categories.destroy'), $category->id)}}"
                                    method="POST" style="display: none;">
                                @csrf
                                @method("DELETE")
                            </form>
                            <button class="btn btn-sm btn-danger quicksand"
                    onclick="event.preventDefault();document.getElementById('delete-category-{{$category->id}}').submit();">
                                {{__('categories.delete')}}</button>
                        @else
                            <form id="activate-category-{{$category->id}}"
                                    action="{{route(trans('admin-urls.categories.update'), $category->id)}}"
                                    method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="activate" value="true">
                                @method("PUT")
                            </form>
                            <button class="btn btn-sm btn-success quicksand"
                                    onclick="event.preventDefault();document.getElementById('activate-category-{{$category->id}}').submit();" >
                                    {{__('categories.activate')}}</button>
                        @endif
                    </div>
                </td>
                @endcan
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$categories->links()}}
</div>
