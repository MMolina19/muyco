<div class="card mb-3">
    <div class="card-body">

        <div class="form-input d-flex justify-content-between align-items-center flex-wrap">
            <i class="fa fa-phone"></i>
            <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                name="phone" placeholder="{{__('my-profile.phone-input')}}"
                value="@isset($userContactInfo['phone']){{ $userContactInfo['phone'] }}@else{{ old('phone')}}@endisset" autofocus>

            @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-input d-flex justify-content-between align-items-center flex-wrap">
            <i class="fa fa-mobile"></i>
            <input id="mobile" type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                name="mobile" placeholder="{{__('my-profile.mobile-input')}}"
                value="@isset($userContactInfo['mobile']){{ $userContactInfo['mobile'] }}@else{{ old('mobile')}}@endisset" autofocus>

            @if ($errors->has('mobile'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('mobile') }}</strong>
                </span>
            @endif
        </div>
        <hr>
    </div>
</div>
