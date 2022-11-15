@if ($config!=null)

<section style="width:100%;">
    <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($config['slides'] as $slideCounter=>$slide)
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="{{$slideCounter}}"
                class="{{$slide['class']}}" aria-label="Slide {{$slideCounter}}"></button>
            @endforeach
        </div>
        <div class="carousel-inner ">
            @foreach ($config['slides']  as $slide)
            <div class="carousel-item {{$slide['class']}}">
                <img class="bd-placeholder-img" width="100%" height="100%"
                    src="{{asset($slide['src'])}}" alt="{{$slide['alt']}}" aria-placeholder="{{$slide['alt']}}" />
            </div>
            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

@endif
