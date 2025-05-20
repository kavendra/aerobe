@extends('layouts.app')
@section('content')
<div class="mid-section">
  <div class="detail-p">
    <div class="container">
      <div class="tag-text">{{ $academy->category->label ?? '' }}</div>
      <h1>{{ $academy->title }}</h1>
      <div class="user-info">
        <p>{{ $academy->event_date }}</p>
      </div>
      <div class="full-img">
        @if ($academy->image && file_exists(public_path('assets/uploads/aerobe-academies/' . $academy->image)))
            <img src="{{ asset('assets/uploads/aerobe-academies/'.$academy->image) }}" />
         @else
            <img src="{{ asset('img/img-dummy.jpg') }}" class="rounded me-2" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
         @endif
      </div>
      {!! $academy->long_description !!}
    </div>
  </div>
</div>
@endsection