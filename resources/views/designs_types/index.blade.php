@extends('main')

@section('title',__('designs_types.title'))

@section('content')

<div class="row">
    <div class="col-12">
        <h1 class="float-left">{{__('designs_types.title')}}</h1>
        @can('is-admin')
        <a class="btn btn-sm btn-success mb-4 float-right"
        href="{{route(trans('urls.designs_types.create'))}}" role="button">
            {{__('designs_types.create')}}
        </a>
        @endcan
    </div>
    <div class="col-lg-12 text-center">
        <div class="card">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">{{ __('designs_types.name') }}</th>
                        <th scope="col">{{ __('designs_types.active') }}</th>
                        <th scope="col">{{ __('designs_types.created_at') }}</th>
                        <th scope="col">{{ __('designs_types.updated_at') }}</th>
                        @can('is-admin')
                        <th scope="col">{{ __('designs_types.actions') }}</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                @foreach ($designstypes as $designtype)
                    <tr>
                        <th scope="row">{{$designtype->id}}</th>
                        <td>{{trans($designtype->name)}}</td>
                        <td>{{$designtype->active}}</td>
                        <td>{{$designtype->created_at}}</td>
                        <td>{{$designtype->updated_at}}</td>
                        @can('is-admin')
                        <td>
                            <div class="d-grid gap-2">
                                <a class="btn btn-sm btn-primary quicksand"
                                    href="{{route(trans('urls.designs_types.edit'),$designtype->id)}}" role="button">
                                    {{__('designs_types.edit')}}
                                </a>
                                @if($designtype->active)
                                    <form id="delete-design_type-{{$designtype->id}}"
                                            action="{{route(trans('urls.designs_types.delete'), $designtype->id)}}"
                                            method="POST" style="display: none;">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                    <button class="btn btn-sm btn-danger quicksand"
                            onclick="event.preventDefault();document.getElementById('delete-design_type-{{$designtype->id}}').submit();">
                                        {{__('designs_types.delete')}}</button>
                                @else
                                    <form id="activate-design_type-{{$designtype->id}}"
                                            action="{{route(trans('urls.designs_types.update'), $designtype->id)}}"
                                            method="POST" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="activate" value="true">
                                        @method("PATCH")
                                    </form>
                                    <button class="btn btn-sm btn-success quicksand"
                                            onclick="event.preventDefault();document.getElementById('activate-design_type-{{$designtype->id}}').submit();" >
                                            {{__('designs_types.activate')}}</button>
                                @endif
                            </div>
                        </td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$designstypes->links()}}
        </div>
    </div>
</div>
@endsection
