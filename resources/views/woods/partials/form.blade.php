@csrf

<div class="form-input">
    <label for="name" class="form-label text-dark">@if($wood){{__('woods.update-name')}}@else{{__('woods.add-name')}}@endif</label>
    <input id="name" type="text"
        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
        name="name" placeholder="{{__('woods.name-input')}}"
        value="@isset($wood){{ $wood->name }}@else{{ old('name') }}@endisset" required autofocus>

    @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<button type="submit" class="btn btn-primary mt-4 signup">
    @isset($create)
    {{__('woods.create')}}
    @else
    {{__('woods.update')}}
    @endif
</button>
