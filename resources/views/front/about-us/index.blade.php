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

    <form id="newslettertop-form">
    @csrf
    <div class="booklet">
       <div class="container">
          <div class="col">
             <img src="{{ asset('img/home/folder.svg') }}" />
             <p>Download our corporate profile</p>
             <a href="#" class="c-btn">Download Now</a>
          </div>
          <div class="col2">
             <img src="{{ asset('img/home/email.svg') }}" />
             <input type="text" class="input" placeholder="Subscribe to our newsletter" />
             <button class="c-btn">Subscribe</button>
          </div>
       </div>
    </div>
    </form>
    
    @include('front.elements.location')

    @include('front.elements.testimonial')
</div>
@endsection