@csrf

<div class="form-row">
    <div class="col-md-12 mb-3">
        <div class="input-group">
            <span class="input-group-text">{{ trans('categories.name') }}</span>
            <input id="name" type="text"
                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                name="name" placeholder="{{ __('categories.name-input') }}"
                value="@isset($category){{ $category->name }}@else{{ old('name') }}@endisset" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-12 mb-3">
        <div class="input-group">
            <span class="input-group-text">{{ trans('categories.description') }}</span>
            <textarea name="description"
            class="form-control @error('description') is-invalid @enderror"
            aria-label="{{ trans('categories.description-textarea') }}"
            aria-placeholder="{{ trans('categories.description-textarea') }}"
            >@if(isset($category)){{$category->description}}@endif</textarea>

            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

<div class="mb-3 form-check">
    <input name="featured" type="checkbox" class="form-check-input" id="featuredCheck1"
        @if(isset($category)) @if($category->featured) checked @endif @endif>
    <label class="form-check-label" for="featuredCheck1">
        {{ trans('categories.featured-category') }}
    </label>
</div>

<button type="submit" class="btn btn-primary mt-4 signup">
    @isset($create)
    {{__('categories.create')}}
    @else
    {{__('categories.update')}}
    @endif
</button>
