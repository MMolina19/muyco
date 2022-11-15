@section('accordion')
<div class="accordion" id="accordion{{__('products.title')}}">

        @include('collections.partials.accordion-item')
        @yield('accordion-item')

</div>
@endsection
