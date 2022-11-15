@extends('dashboard')

@section('content')
    <a class="btn btn-sm btn-success float-right"
        href="{{route(trans('admin-urls.products.index'))}}" role="button">
        {{__('products.back')}}
    </a>
    <div class="card-light">

        <div class="card-header">
            {{__('products.edit-title')}}
        </div>
        <div class="card-body">
            <form method="POST"
                action="{{ route(trans('admin-urls.products.update'), $product->id) }}"
                enctype="multipart/form-data"
            >
                @method('PATCH')
                <input type="hidden" name="update" value="true">
                @include('admin.products.partials.form')
            </form>
        </div>

    </div>
@endsection

@section('scripts')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection
