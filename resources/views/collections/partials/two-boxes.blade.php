<div class="row mb-2">
    @if($products)
    <div class="col-md-12">
        @foreach($products as $product)
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static bg-light">
                <strong class="d-inline-block mb-2 text-success">
                    {{__('products.singular-title')}}
                </strong>

                <h3 class="mb-0">{{$product->name}}</h3>
                <div class="mb-1 text-muted">{{$product->created_at}}</div>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img class="bd-placeholder-img" width="200" height="250"
                src="{{asset('images/thumbnails/200x250/thumbnail_200_x_250_silla_mod20_01.jpg')}}"
                role="img" placeholder="Tapizados" focusable="false" />
            </div>
        </div>
        @endforeach
    </div>
    @endif
  </div>
