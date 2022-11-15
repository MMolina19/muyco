@if ($config!=null)

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
@foreach ($config['thumbs'] as $thumb)

    @include('partials.modal')

    <div class="col">
        <div class="card-bglight shadow-sm">
            <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                src="{{asset($thumb['src'])}}" />
            <div class="card-body">
                <p class="card-text">{{$thumb['p']}}</p>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="{{$thumb['a-href']}}">Ver</button>
                    <!--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>-->
                </div>
                <small class="text-muted">9 mins</small>
                </div>
            </div>
        </div>
    </div>

@endforeach
</div>
@endif
