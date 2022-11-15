<div class="form-input d-flex justify-content-between align-items-center flex-wrap">

    <select name="role_id" class="form-select form-select-lg"
        aria-label="{{__('my-profile.update-select-role')}}">

        @foreach ($roles as $rolecollection)
            <option value="{{$rolecollection->id}}"
                @if($userRole->id == $rolecollection->id)
                selected
                @endif >
                {{__('auth.user-role-'.strtolower($rolecollection->name))}}
            </option>
        @endforeach
    </select>
    @if ($errors->has('role_id'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('role_id') }}</strong>
        </span>
    @endif

</div>
