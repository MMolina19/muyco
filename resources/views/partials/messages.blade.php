@if(Session::has('message'))
<div id="showMe" class="alert alert-{{ Session::get('status') }}">
    {{ Session::get('message') }}
</div>
@endif
