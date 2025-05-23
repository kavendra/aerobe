@extends('layouts.app')
@section('content')
<div class="mid-section">
  <div class="detail-p">
    <div class="container">
	  	@if($newsEvent->tag)
	    	<div class="tag-text">{{ $newsEvent->tag->label ?? '' }}</div>
	    @endif
      <h1>{{ $newsEvent->title }}</h1>
      <div class="user-info">
        <p>{{ $newsEvent->event_date }}</p>
      </div>
      <div class="full-img">
        @if ($newsEvent->image && file_exists(public_path('assets/uploads/news-events/' . $newsEvent->image)))
            <img src="{{ asset('assets/uploads/news-events/'.$newsEvent->image) }}" />
         @else
            <img src="{{ asset('img/img-dummy.jpg') }}" class="rounded me-2" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
         @endif
      </div>
      {!! $newsEvent->long_description !!}
    </div>
  </div>
</div>
@endsection