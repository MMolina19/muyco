@section('accordion')
<div class="accordion" id="accordion{{__('products.title')}}">

        @include('collection_images.partials.accordion-item')
        @yield('accordion-item')

</div>
@endsection
