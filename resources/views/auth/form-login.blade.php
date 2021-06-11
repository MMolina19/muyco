<form method="POST" action="{{ route('login') }}">
@csrf

<div class="form-input">
    <!-- <i class="fa fa-envelope"></i>-->
    <i class="fa fa-user"></i>
    <input id="username" type="text" placeholder="{{__('auth.username-or-email')}}"
               class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
               name="username" value="{{ old('username')}}" required autofocus>

    @if ($errors->has('username'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('username') }}</strong>
        </span>
    @endif
</div>

<div class="form-input">
    <i class="fa fa-lock"></i>
    <input id="password" type="password" placeholder="{{__('auth.password-input')}}"
        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
            name="password" required>

    @if ($errors->has('password'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
</div>

<div class="form-check">
    <input class="form-check-input" type="checkbox" value="" id="rememberCheckChecked" name="remember" {{ old('remember') ? 'checked' : '' }} checked>
    <label class="form-check-label" for="rememberCheckChecked"> {{ __('messages.remember') }} </label>
</div>

<!--
<div class="form-check">
     <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
     <label class="form-check-label" for="flexCheckChecked"> I agree all the statements </label>
</div>
<button class="btn btn-primary mt-4 signup">Start coding now</button>
-->

<div class="form-input row mb-4">
    <div class="col-md-8 offset-md-4">
        <button type="submit" class="btn btn-primary mt-4 signup">
            {{ __('messages.login') }}
        </button>

        <a class="btn btn-link" href="{{ url('forgot_password/') }}">
            {{ __('auth.forgot') }}
        </a>
    </div>
</div>

<p class="text-center mb-3">
    {{ __('auth.or-login-with') }}
</p>

@include('partials.socials-icons')


<div class="text-center mt-4">
    <span>{{__('auth.already-a-member')}}</span>
    <a href="#" class="text-decoration-none">{{__('messages.login')}}</a>
</div>

</form>
