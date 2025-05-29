@extends('layouts.app')

@section('content')
<div class="mid-section">
  <div class="detail-p">
    <div class="container">
      <h1>{{ $solution->title }}</h1>
      <div class="full-img">
        @if ($solution->image && file_exists(public_path('assets/uploads/solutions/' . $solution->image)))
          <img src="{{ asset('assets/uploads/solutions/'.$solution->image) }}" />
      @else
          <img src="{{ asset('img/img-dummy.jpg') }}" />
      @endif
      </div>
      {!! $solution->long_description !!}
    </div>
  </div>
</div>
@endsection