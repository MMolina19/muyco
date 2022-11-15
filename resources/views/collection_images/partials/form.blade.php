@csrf
<div class="row">
    <div class="col-6 card-light p-3">
        <div class="form-input d-flex justify-content-between align-items-center flex-wrap">
            <label for="product_id" class="form-label text-dark">
                {{__('collections.product')}}
            </label>
            <select name="product_id" class="form-select" id="type"
                aria-label="{{__('collections.select-product')}}">

                <option value="0" class="required">
                    -- {{__('collections.select-product')}} --
                </option>

                @foreach($products as $item)
                    <option value="{{$item->id}}"
                        @if($collection)
                            @foreach ($collection->products as $product)
                                @if(old('product_id') === $product->name)
                                    selected
                                @elseif($product->name === $item->name)
                                    selected
                                @endif
                            @endforeach
                            >
                            {{$item->name}}
                            @else
                            >
                            {{$item->name}}
                        @endif
                    </option>
                @endforeach

            </select>
            @if ($errors->has('product'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('product') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-input">
            <label for="name" class="form-label text-dark">{{__('collections.name')}}</label>
            <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                name="name" placeholder="{{__('collections.name-input')}}"
                value="@isset($collection){{ $collection->name }}@else{{ old('name') }}@endisset" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-input">
            <label for="descriptionTextArea" class="form-label text-dark">{{__('collections.description')}}</label>
            <textarea id="descriptionTextArea" type="text" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"
                name="description" placeholder="{{__('collections.description-textarea')}}" rows="4"
                autofocus>@isset($collection){{ $collection->description }}@else{{ old('description') }}@endisset</textarea>
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-input">
            <label for="amount" class="form-label text-dark">{{__('collections.amount-input')}}</label>
            <input id="amount" type="text" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}"
                name="amount" placeholder="{{__('collections.amount-input')}}"
                value="@isset($collection){{ $collection->amount }}@else{{ old('amount') }}@endisset" required autofocus>

            @if ($errors->has('amount'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('amount') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-6 card-light p-3">
        <button type="submit" class="btn btn-primary signup">
            @if($create)
            {{__('collections.create')}}
            @else
            {{__('collections.update')}}
            @endif
        </button>
    </div>
</div>
