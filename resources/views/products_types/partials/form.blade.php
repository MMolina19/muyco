@csrf

<div class="form-input">
    <label for="name" class="form-label text-dark">@if($product){{__('products.update-name')}}@else{{__('products.add-name')}}@endif</label>
    <input id="name" type="text"
        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
        name="name" placeholder="{{__('products.name-input')}}"
        value="@isset($product){{ $product->name }}@else{{ old('name') }}@endisset" required autofocus>

    @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<button type="submit" class="btn btn-primary mt-4 signup">
    @isset($create)
    {{__('products.create')}}
    @else
    {{__('products.update')}}
    @endif
</button>
