@extends('layouts.app')
@section('content')

@if($page == 'terms')
	<div class="banner-top-term">
		<img src="{{ asset('img/banner-term.jpg') }}" alt="" />
		<div class="textb">
			<div class="container">
				<h2>Terms of Services</h2>
			</div>
		</div>
	</div>
@elseif($page == 'privacy')
	<div class="banner-top-term">
		<img src="{{ asset('img/banner-privacy.jpg') }}" alt="" />
		<div class="textb">
			<div class="container">
				<h2>Privacy Policy</h2>
			</div>
		</div>
	</div>
@elseif($page == 'cookie-preferences')
	<div class="banner-top-term">
		<img src="{{ asset('img/banner-term.jpg') }}" alt="" />
		<div class="textb">
			<div class="container">
				<h2>Cookie Preferences</h2>
			</div>
		</div>
	</div>
@endif	

<div class="mid-section">
    <div class="container">
        {!! $desc !!}
    </div>
</div>
@endsection