<!--Navbar-->
<nav class="navbar-1 sub-nav navbar-expand-lg justify-content-center  mt-0 mb-5">

    <!-- Navbar brand -->
    <span class="navbar-brand">{{__('products.title')}}:</span>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button"
        data-toggle="collapse"
        data-target="#basicExampleNav"
        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item @if($productSelected=='all') active @endif">
                <a class="nav-link waves-effect waves-light @if($productSelected==null) active @endif"
                    href="{{ url( __('urls.collections-request',['product_slug' => '']) ) }}"> {{__('products.all')}}
                    @if($productSelected==null) <span class="sr-only">({{__('products.current')}})</span> @endif
                </a>
            </li>

            @foreach ($products as $product)
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light @if($productSelected==trans($product->slug)) active @endif"
                    href="{{ url( __('urls.collections-request',['product_slug' => trans($product->slug)]) ) }}">{{__($product->name)}}</a>
                    @if($productSelected==$product) <span class="sr-only">({{__('products.current')}})</span> @endif
                </li>
            @endforeach

        </ul>
        <!-- Links -->

        <!--
        <form class="form-inline">
            <div class="md-form my-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            </div>
        </form>
        -->
    </div>
    <!-- Collapsible content -->
</nav>
