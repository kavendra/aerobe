@extends('layouts.app')
@section('content')
<div class="mid-section">
  <div class="detail-p">
    <div class="container">
      <div class="tag-text">{{ $knowledgeHub->category->label ?? '' }}</div>
      <h1>{{ $knowledgeHub->title ?? '' }}</h1>
      <div class="user-info">
        <p>{{ $knowledgeHub->event_date }}</p>
      </div>
      <div class="full-img">
        @if ($knowledgeHub->image && file_exists(public_path('assets/uploads/knowledge-hubs/' . $knowledgeHub->image)))
           <img src="{{ asset('assets/uploads/knowledge-hubs/'.$knowledgeHub->image) }}" />
        @else
           <img src="{{ asset('img/img-dummy.jpg') }}" class="rounded me-2" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
        @endif
      </div>
      {!! $knowledgeHub->long_description !!}
    </div>
  </div>
</div>
@endsection