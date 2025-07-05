@extends('layouts.app')

@section('content')
<div class="mid-section">
    <div class="detail-p">
        <div class="container">
            <h1>{{ $solution->title }}</h1>
            <div class="full-img">
                @if ($solution->main_img && file_exists(public_path('assets/uploads/solutions/' . $solution->main_img)))
                    <img src="{{ asset('assets/uploads/solutions/'.$solution->main_img) }}" title="Site Logo" />
                @else
                    <img src="{{ asset('img/img-dummy.jpg') }}" />
                @endif
            </div>
            {!! $solution->long_description !!}
            
            @if(!empty($solution->read_more))
            <div class="btn-row">
				<a href="read-m" class="c-btn">Read More</a>
			</div>
			@endif
        </div>
    </div>
</div>
@endsection