@csrf

<div class="form-input">
    <label for="name" class="form-label text-dark">@if($designtype){{__('designs_types.update-name')}}@else{{__('designs_types.add-name')}}@endif</label>
    <input id="name" type="text"
        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
        name="name" placeholder="{{__('designs_types.name-input')}}"
        value="@isset($designtype){{ $designtype->name }}@else{{ old('name') }}@endisset" required autofocus>

    @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<button type="submit" class="btn btn-primary mt-4 signup">
    @isset($create)
    {{__('designs_types.create')}}
    @else
    {{__('designs_types.update')}}
    @endif
</button>
