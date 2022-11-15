@csrf
<div class="form-row">
    <div class="col-md-12 mb-3">
        <div class="input-group">
            <span class="input-group-text" for="category_id">{{trans('products.category')}}</span>
            <select
                name="category_id"
                id="category_id"
                class="form-select @error('category_id') is-invalid @enderror"
            >
                <option value="">{{ trans('products.select-category') }}</option>
                @foreach ($categories as $category)
                    <option
                        value="@isset($category->name){{ $category->id }}@else{{ old('category_id') }}@endisset"
                        @if(isset($create))
                        @else
                            @if($product->category_id == $category->id)
                                selected
                            @endif
                        @endif
                        >{{ $category->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('category_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('category_id') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
        <div class="input-group">
            <span class="input-group-text" for="brand_id">{{trans('products.brand')}}</span>
            <select
                name="brand_id"
                id="brand_id"
                class="form-select @error('brand_id') is-invalid @enderror"
                aria-placeholder="{{ trans('products.select-brand') }}"
            >
                <option value="">{{ trans('products.select-brand') }}</option>
                @foreach ($brands as $brand)
                    <option
                        value="@isset($brand->name){{ $brand->id }}@else{{ old('brand_id') }}@endisset"
                        @if(isset($create))
                        @else
                            @if($product->brand_id == $brand->id)
                                selected
                            @endif
                        @endif
                        >{{ $brand->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('brand_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('brand_id') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
        <div class="input-group">
            <span class="input-group-text" for="model">{{ trans('products.product-model') }}</span>
            <input
                name="model"
                id="model"
                type="text"
                class="form-control @error('model') is-invalid @enderror"
                value="@isset($product){{ $product->model }}@else{{ old('model') }}@endisset"
                required
                autofocus
            >

            @if ($errors->has('model'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('model') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-12 mb-3">
        <div class="input-group">
            <span class="input-group-text" for="description">{{ trans('products.product-description') }}</span>
            <textarea
                name="description"
                id="description"
                class="form-control @error('description') is-invalid @enderror"
            >@if(isset($product)){{$product->description}}@endif</textarea>

            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-12 mb-3">
        <div class="input-group">
            <span class="input-group-text" for="stock">{{trans('products.stock')}}</span>
            <input
                name="stock"
                id="stock"
                type="number"
                step="any"
                class="form-control @error('stock') is-invalid @enderror"
                value="@if(isset($product)){{$product->stock}}@endif">

            @error('stock')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-6 mb-3 pe-3">
        <div class="input-group">
            <span class="input-group-text" for="price">{{trans('products.price')}}</span>
            <span class="input-group-text">$</span>
            <input
                name="price"
                id="price"
                type="number"
                step="any"
                class="form-control @error('price') is-invalid @enderror"
                value="@if(isset($product)){{ $product->prices->sortByDesc('id')->first()->price }}@endif">

            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="input-group">
            <span class="input-group-text" for="sale_price">{{trans('products.sale_price')}}</span>
            <span class="input-group-text">$</span>
            <input
                name="sale_price"
                id="sale_price"
                type="number"
                step="any"
                class="form-control @error('sale_price') is-invalid @enderror"
                value="@if(isset($product)){{ $product->prices->sortByDesc('id')->first()->sale_price }}@endif"
            >

            @error('sale_price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-12 mb-3">
        @if( isset($product->images) )
            @foreach ($product->images as $image)
                <img
                    src="{{ asset($image->url.$image->name.$image->extension) }}"
                    class="img-responsive"
                    style="max-height:100px; max-width:100px;"
                    alt="{{$image->name}}"
                />
            @endforeach
        @endif
    </div>
</div>

<div class="form-row">
    <div class="col-md-12 mb-3">
        <div class="input-group">
            <span class="input-group-text" for="images">{{trans('products.upload_product_images')}}</span>
            <input
                type="file"
                name="images[]"
                id="images"
                class="form-control @error('images') is-invalid @enderror"
                accept="image/*"
                multiple
            >

            @error('stock')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div class="mb-3 form-check">
    <input name="featured" type="checkbox" class="form-check-input" id="featuredCheck1" @if(isset($product)) @if($product->featured) checked @endif @endif>
    <label class="form-check-label" for="featuredCheck1">{{ trans('products.featured-product') }}</label>
</div>

<button type="submit" class="btn btn-primary mt-4 signup">
    @isset($create)
    {{__('products.create')}}
    @else
    {{__('products.update')}}
    @endif
</button>
