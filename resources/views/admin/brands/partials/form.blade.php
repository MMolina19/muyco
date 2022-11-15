@csrf
<div class="form-row">
    <div class="col-md-6 mb-3">
        <div class="input-group">
            <span class="input-group-text">{{ trans('brands.name') }}</span>
            <input id="name" type="text"
                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                name="name" placeholder="{{__('brands.name-input')}}"
                value="@isset($brand){{ $brand->name }}@else{{ old('name') }}@endisset" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary mt-4 signup">
    @isset($create)
    {{__('brands.create')}}
    @else
    {{__('brands.update')}}
    @endif
</button>
