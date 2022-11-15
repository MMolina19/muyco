<div class="card mb-3">
    <div class="card-body">

        <div class="form-input d-flex justify-content-between align-items-center flex-wrap">
            <i class="fa fa-instagram"></i>
            <input id="instagram" type="text" class="form-control{{ $errors->has('instagram') ? ' is-invalid' : '' }}"
                name="instagram" placeholder="{{__('my-profile.instagram-input')}}"
                value="@isset($userSocialMedia){{ $userSocialMedia->instagram }}@else{{ old('instagram')}}@endisset" autofocus>

            @if ($errors->has('instagram'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('instagram') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-input d-flex justify-content-between align-items-center flex-wrap">
            <i class="fa fa-facebook"></i>
            <input id="facebook" type="text" class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}"
                name="facebook" placeholder="{{__('my-profile.facebook-input')}}"
                value="@isset($userSocialMedia){{ $userSocialMedia->facebook }}@else{{ old('facebook')}}@endisset" autofocus>

            @if ($errors->has('facebook'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('facebook') }}</strong>
                </span>
            @endif
        </div>

    </div>
</div>
