@csrf

<div class="form-input">
    <i class="fa fa-user"></i>
    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
        name="username" placeholder="{{__('auth.username-input')}}"
        value="@isset($user){{ $user->username }}@else{{ old('username')}}@endisset" autofocus>

    @if ($errors->has('username'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('username') }}</strong>
        </span>
    @endif
</div>

<div class="form-input">
    <i class="fa fa-address-card"></i>
    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
        name="name" placeholder="{{__('auth.name-input')}}"
        value="@isset($user){{ $user->name }}@else{{ old('name') }}@endisset" required autofocus>

    @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-input">
    <i class="fa fa-envelope"></i>
    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
    name="email" placeholder="{{__('auth.email-input')}}"
    value="@isset($user){{ $user->email }}@else{{ old('email') }}@endisset" required autofocus>

    @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<div class="form-input">
    <i class="fa fa-phone"></i>
    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
    name="phone" placeholder="{{__('auth.phone-input')}}"
    value="@isset($user){{ $user->phone }}@else{{ old('phone') }}@endisset" autofocus>

    @if ($errors->has('phone'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('phone') }}</strong>
        </span>
    @endif
</div>

@isset($create)
<div class="form-input">
    <i class="fa fa-lock"></i>
    <input type="password" class="form-control" name="password" placeholder="{{__('auth.password-input')}}">

    @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
</div>
<div class="form-input">
    <i class="fa fa-lock"></i>
    <input id="password_confirmation" type="password" class="form-control"
    placeholder="{{__('auth.password-confirmation-input')}}" name="password_confirmation" required>
    @if ($errors->has('password_confirmation'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
        </span>
    @endif
</div>
@endisset


<div class="mb-3 text-left">
    @foreach ($roles as $role)
        <div class="form-check">
            <input class="form-check-input" name="roles[]"
                type="checkbox" value="{{ $role->id }}" id="{{ $role->id }}"
                @isset($user)
                    @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked
                    @endif
                @endisset>
            <label class="form-check-label" for="{{$role->name}}">
                {{ $role->name }}</label>
        </div>
    @endforeach
<div>


<button type="submit" class="btn btn-primary mt-4 signup">
    @isset($create)
    {{__('auth.create-account')}}
    @else
    {{__('auth.update-account')}}
    @endif
</button>
