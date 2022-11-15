@extends('main')

@section('titulo', __('start.title'))

@section('content')

@include('partials.carousel')

@include('partials.thumbnails-album')

@include('partials.two-boxes')

@endsection
