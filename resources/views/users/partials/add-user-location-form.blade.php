
<div class="card mb-3">
    <div class="card-body">
        <div class="form-input d-flex justify-content-between align-items-center flex-wrap">
            <!--<label>{{__('my-profile.province')}}</label>-->
            <select name="province_id" class="form-select" id="type"
                aria-label="{{__('my-profile.select-province')}}">

                @if($userLocationMethod == 'update'))
                    <option value="0" @if($userLocation->province_id == null) selected @endif>
                @elseif($userLocationMethod == 'store' && $userLocation==null))
                    <option value="0" class="required" selected>
                @endif
                        -- {{__('users.province')}} --
                    </option>

                    @foreach ($provinces as $province)
                        @if($province->id!=null)
                        <option value="{{$province->id}}"
                            @if($userLocationMethod == 'update'))
                                @if($userLocation->province_id==$province->id)
                                selected
                                @endif
                            @endif
                            >
                            {{$province->name}}
                        </option>
                        @endif
                    @endforeach

            </select>
            @if ($errors->has('province'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('province') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-input d-flex justify-content-between align-items-center flex-wrap">
            <i class="fa fa-map-marker"></i>
            <!--<label>{{__('my-profile.city')}}</label>-->
            <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                name="city" placeholder="{{__('my-profile.city-input')}}"
                value="@isset($userLocation->city){{ $userLocation->city }}@else{{ old('city')}}@endisset" autofocus>
            @if ($errors->has('city'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('city') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-input d-flex justify-content-between align-items-center flex-wrap">
            <i class="fa fa-home"></i>
            <!--<label>{{__('my-profile.address')}}</label>-->
            <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                name="address" placeholder="{{__('my-profile.address-input')}}"
                value="@isset($userLocation->address){{ $userLocation->address }}@else{{ old('address')}}@endisset" autofocus>
            @if ($errors->has('address'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
        <hr>
    </div>
</div>
