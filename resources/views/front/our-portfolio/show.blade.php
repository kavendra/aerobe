@extends('layouts.app')
@section('content')
<div class="mid-section">
  <div class="detail-p">
    <div class="container">
      <h1>{{ $ourPortfolio->title }}</h1>
      <div class="full-img">
        @if ($ourPortfolio->image && file_exists(public_path('assets/uploads/our-portfolios/' . $ourPortfolio->image)))
          <img src="{{ asset('assets/uploads/our-portfolios/'.$ourPortfolio->image) }}" />
      @else
          <img src="{{ asset('img/img-dummy.jpg') }}" />
      @endif
      </div>
      {!! $ourPortfolio->long_description !!}
    </div>
  </div>
</div>
@endsection