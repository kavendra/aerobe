@extends('layouts.app')
@section('content')
<div class="top-banner csr-banner">
	<div class="textb2">
	<h2>Bringing Quality Healthcare to Rural India</h2>
	<p>Your support can save lives. Join us in transforming rural healthcare through telemedicine.</p>
</div>
</div>
<div class="mid-section">
	<div class="csr-section">
		<div class="container">
			<div class="tab-content">
				<div class="blog-list" style="display: block">
					<ul>
						<li>
							<div class="imgb">
								@if ($csr->image && file_exists(public_path('assets/uploads/csrs/' . $csr->image)))
						            <img src="{{ asset('assets/uploads/csrs/'.$csr->image) }}" />
						        @else
						            <img src="{{ asset('img/img-dummy.jpg') }}" class="rounded me-2" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
						        @endif
							</div>
							<div class="textb">
								<span class="cate-tag">{{ $csr->category->label ?? '' }}</span>
								<h3>{{ $csr->title }}</h3>
								<p>{{ $csr->short_description }}</p>
								<div class="admin-info">
									<div class="admin-icon">
										@if($csr->author_image && file_exists(public_path('assets/uploads/csrs/' . $csr->author_image)))
								            <img src="{{ asset('assets/uploads/csrs/'.$csr->author_image) }}" />
								        @else
								            <img src="{{ asset('img/img-user.jpg') }}" alt="" />
								        @endif
									</div>
									<div class="admin-text">
										<p><strong>{{ $csr->author_name }}</strong></p>
										<p>{{ $csr->event_date }}<img src="{{ asset('img/dot.jpg') }}" alt="" /> 5 min read</p>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection