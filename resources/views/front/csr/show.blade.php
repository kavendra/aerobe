@extends('layouts.app')
@section('content')
<div class="mid-section">
  <div class="detail-p">
    <div class="container">
	  	@if($csr->tag)
	    	<div class="tag-text">{{ $csr->tag->label }}</div>
	    @endif
      <h1>{{ $csr->title }}</h1>
      <div class="user-info">
        <p>{{ $csr->event_date }}</p>
      </div>
      <div class="full-img">
        @if ($csr->image && file_exists(public_path('assets/uploads/csrs/' . $csr->image)))
            <img src="{{ asset('assets/uploads/csrs/'.$csr->image) }}" />
        @else
            <img src="{{ asset('img/img-dummy.jpg') }}" class="rounded me-2" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
        @endif
      </div>
      {!! $csr->long_description !!}
    </div>
  </div>
</div>
@endsection