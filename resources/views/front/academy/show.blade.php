@extends('layouts.app')
@section('content')
<div class="mid-section">
  <div class="course">
    <div class="container">
      <div class="textb">
        <h4>Let's <strong>Begin</strong></h4>
        <h3>Let's Find The Right Course For you</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br/>Etiam dignissim, sem non convallis molestie.</p>
      </div>
      <div class="imgb">
        <img src="{{ asset('img/hero-academy.svg') }}" alt="" />
      </div>
    </div>
  </div>
  <div class="latest-post">
    <div class="container">
      <h2>Academy Detail</h2>
      <div class="items-container grid-view active">
         <div class="item">
          <div class="imgb">
            @if ($academy->image && file_exists(public_path('assets/uploads/aerobe-academies/' . $academy->image)))
               <img src="{{ asset('assets/uploads/aerobe-academies/'.$academy->image) }}" />
            @else
               <img src="{{ asset('img/img-dummy.jpg') }}" class="rounded me-2" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
            @endif
          </div>
          <div class="textb">
            <span class="tag-text">{{ $academy->category->label }}</span>
            <h3><a href="#"> {{ $academy->short_description }}</a></h3>
            <div class="review">
              <p style="display: block;"><span>1,234</span> views <img src="{{ asset('img/dot.jpg') }}" /> <span>56</span> likes</p>
              <a  href="#">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection