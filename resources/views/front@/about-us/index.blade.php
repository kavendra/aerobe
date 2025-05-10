@extends('layouts.app')
@section('content')
  <div class="top-banner">
    <div class="imgb">
        @if ($aboutUs->header_image && file_exists(public_path('assets/uploads/about-us/' . $aboutUs->header_image)))
        <img src="{{ asset('assets/uploads/about-us/'.$aboutUs->header_image) }}" />
        @else
           <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="20"  data-holder-rendered="true" />
       @endif
    </div>
    <div class="textb">
        <h1>{!! $aboutUs->header_heading !!}</h1>
        <p>{!! $aboutUs->header_title !!}</p>
    </div>
</div>
<div class="mid-section">
    <div class="about">
        {!! $aboutUs->about_desc !!}
    </div>

    @include('front.elements.newsletter')
    
    @include('front.elements.location')

    @include('front.elements.prominent-customer')

    @include('front.elements.testimonial')
</div>
@endsection