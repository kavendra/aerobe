@extends('layouts.app')
@section('content')
<div class="mid-section">
  <div class="detail-p">
    <div class="container">
	  	@if($shop->tag)
	    	<div class="tag-text">{{ $shop->tag->label }}</div>
	    @endif
      <h1>{{ $shop->title }}</h1>
      <div class="user-info">
        <p>{{ $shop->event_date }}</p>
      </div>
      <div class="full-img">
        @if ($shop->image && file_exists(public_path('assets/uploads/shop/' . $shop->image)))
	        <img src="{{ asset('assets/uploads/shop/'.$shop->image) }}" />
	    @else
	        <img src="{{ asset('img/img-dummy.jpg') }}" />
	    @endif
      </div>
      {!! $shop->long_description !!}
    </div>
  </div>
</div>
@endsection