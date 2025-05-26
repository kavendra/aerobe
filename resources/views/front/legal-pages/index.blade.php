@extends('layouts.app')
@section('content')


<div class="top-banner news">
    	 @if ($legalInfo->header_image && file_exists(public_path('assets/uploads/cms-pages/' . $legalInfo->header_image)))
            <img src="{{ asset('assets/uploads/cms-pages/'.$legalInfo->header_image) }}" />
         @else
            <img src="{{ asset('img/img-dummy.jpg') }}" class="rounded me-2" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
         @endif
    <div class="textb2">
        <div class="container">
           	<h2>{{ $legalInfo->header_title }}</h2>
				<p>{!! $legalInfo->header_desc !!}</p>
        </div>
    </div>
</div>


<div class="mid-section">
    <div class="container3">
        {!! $desc !!}
    </div>
</div>
@endsection