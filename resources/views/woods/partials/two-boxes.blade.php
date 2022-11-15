<div class="row gx-5">
    @if($wood)
    <div class="container">
        <a class="btn btn-sm btn-success mb-4 float-right"
            href="{{route(trans('urls.woods'))}}" role="button">
            {{__('woods.back')}}
        </a>
    </div>
    <div class="container">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative text-dark">
            <div class="col p-4 d-flex flex-column position-static bg-light">
                <strong class="d-inline-block mb-2 text-success">
                    {{__('woods.singular-title')}}
                </strong>

                <h3 class="mb-0">{{$wood->name}}</h3>
                <div class="mb-1 text-muted">{{$wood->active}}</div>
                <div class="mb-1 text-muted">{{$wood->created_at}}</div>
                <div class="mb-1 text-muted">{{$wood->updated_at}}</div>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img class="bd-placeholder-img" width="200" height="250"
                src="{{asset('images/thumbnails/200x250/thumbnail_200_x_250_silla_mod20_01.jpg')}}"
                role="img" placeholder="Tapizados" focusable="false" />
            </div>
        </div>

    </div>
    @endif
  </div>
