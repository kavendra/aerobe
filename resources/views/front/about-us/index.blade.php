@extends('layouts.app')
@section('content')
  <div class="top-banner">
    <div class="imgb">
        @if ($aboutUs->header_image && file_exists(public_path('assets/uploads/about-us/' . $aboutUs->header_image)))
            <img src="{{ asset('assets/uploads/about-us/'.$aboutUs->header_image) }}" />
        @endif
    </div>
    <div class="textb">
        <h1>{!! $aboutUs->header_heading !!}</h1>
        <p>{!! $aboutUs->header_title !!}</p>
    </div>
</div>
<div class="mid-section">
    <div class="about">
        <div class="container">
            {!! $aboutUs->about_desc !!}
        </div>
    </div>

    @include('front.elements.newsletter')
    
    @include('front.elements.location')

    @include('front.elements.prominent-customer')

    @include('front.elements.testimonial')
</div>
@endsection