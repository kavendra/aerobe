@extends('layouts.app')
@section('content')
<div class="mid-section">
  <div class="detail-p">
    <div class="container">
      <h1>{{ $ourPortfolio->title }}
          @if(!empty($ourPortfolio->country_id[0]))
          <span class="icon" style="float: right;">
            @if(in_array(3, $ourPortfolio->country_id))
            <img src="{{ asset('img/india-flag.jpg') }}"> 
            @endif
            @if(in_array(2, $ourPortfolio->country_id))
            <img src="{{ asset('img/australia-flag.jpg') }}">
            @endif
            @if(in_array(1, $ourPortfolio->country_id))
            <img src="{{ asset('img/singapore-flag.jpg') }}">
            @endif
            @if(in_array(4, $ourPortfolio->country_id))
            <img src="{{ asset('img/malaysia-flag.jpg') }}">
            @endif
          </span>
          @endif
        </h1>
      <div class="full-img">
        @if ($ourPortfolio->image && file_exists(public_path('assets/uploads/our-portfolios/' . $ourPortfolio->image)))
          <img src="{{ asset('assets/uploads/our-portfolios/'.$ourPortfolio->image) }}" />
      @else
          <img src="{{ asset('img/img-dummy.jpg') }}" />
      @endif
      </div>
      {!! $ourPortfolio->long_description !!}

      @include('front.our-portfolio.download')
    </div>
  </div>
</div>
@endsection