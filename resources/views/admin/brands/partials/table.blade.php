<div class="table-responsive">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th class="text-center"> # </th>
                <th class="text-center">{{ __('brands.name') }}</th>
                <th class="text-center">{{ __('brands.status') }}</th>
                <th class="text-center">{{ __('brands.created_at') }}</th>
                <th class="text-center">{{ __('brands.updated_at') }}</th>
                @can('is-admin')
                <th class="text-center">{{ __('brands.actions') }}</th>
                @endcan
            </tr>
        </thead>
        <tbody>
        @forelse ($brands as $brand)
            <tr>
                <td class="text-center">{{ $brand->id }}</td>
                <td class="text-center">{{ $brand->name }}</td>
                <td class="text-center">
                    @if ($brand->active == 1)
                        <span class="text-center badge badge-success">{{ __('brands.active') }}</span>
                    @else
                        <span class="text-center badge badge-danger">{{ __('brands.inactive') }}</span>
                    @endif
                </td>
                <td class="text-center col-1">
                    {{$brand->created_at}}
                </td>
                <td class="text-center col-1">
                    {{$brand->updated_at}}
                </td>
                @can('is-admin')
                <td class="text-center col-2">
                    <div class="d-grid gap-2">
                        <a class="btn btn-sm btn-primary quicksand"
                            href="{{route(trans('admin-urls.brands.edit'),$brand->id)}}" role="button">
                            {{__('brands.edit')}}
                        </a>
                        @if($brand->active)
                            <form id="delete-brand-{{$brand->id}}"
                                    action="{{route(trans('admin-urls.brands.destroy'), $brand->id)}}"
                                    method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="deactivate" value="true">
                                @method("PUT")
                            </form>
                            <button class="btn btn-sm btn-danger quicksand"
                    onclick="event.preventDefault();document.getElementById('delete-brand-{{$brand->id}}').submit();">
                                {{__('brands.delete')}}</button>
                        @else
                            <form id="activate-brand-{{$brand->id}}"
                                    action="{{route(trans('admin-urls.brands.update'), $brand->id)}}"
                                    method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="activate" value="true">
                                @method("PUT")
                            </form>
                            <button class="btn btn-sm btn-success quicksand"
                                    onclick="event.preventDefault();document.getElementById('activate-brand-{{$brand->id}}').submit();" >
                                    {{__('brands.activate')}}</button>
                        @endif
                    </div>
                </td>
                @endcan
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">{{ trans('brands.no_records_yet') }}</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{$brands->links()}}
</div>
