<form method="POST" action="{{ route('register') }}">
@csrf

<div class="form-input">
    <i class="fa fa-user"></i>
    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
    name="username" placeholder="{{__('auth.username-input')}}" value="{{ old('username') }}" required autofocus>

    @if ($errors->has('username'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('username') }}</strong>
        </span>
    @endif
</div>

<div class="form-input">
    <i class="fa fa-address-card"></i>
    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
        name="name" placeholder="{{__('auth.name-input')}}" value="{{ old('name') }}" required autofocus>

    @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-input">
    <i class="fa fa-envelope"></i>
    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
    name="email" placeholder="{{__('auth.email-input')}}" value="{{ old('email') }}" required autofocus>

    @if ($errors->has('username'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('username') }}</strong>
        </span>
    @endif
</div>

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

<div class="form-check">
     <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
     <label class="form-check-label" for="flexCheckChecked">{{__('register.terms-and-conditions')}}</label>
</div>

<button type="submit" class="btn btn-primary mt-4 signup">
    {{__('auth.create-account')}}
</button>

</form>
