@extends('layouts.app')
@section('content')
<div class="top-banner csr-banner">
	<div class="textb2">
	<h2>Shop</h2>
	<p>Be part of a team that's revolutionizing rural healthcare through innovative telemedicine solutions.</p>
</div>
</div>

<div class="mid-section">
	<div class="latest-post">
		<div class="container">
			<h2>Shop Detail</h2>
			<div class="shoplist" id="post-container">
				<div class="item">
					<div class="imgb">
						@if ($shop->image && file_exists(public_path('assets/uploads/shop/' . $shop->image)))
					        <img src="{{ asset('assets/uploads/shop/'.$shop->image) }}" />
					    @else
					        <img src="{{ asset('img/img-dummy.jpg') }}" />
					    @endif
					</div>
					<div class="textb">
						@if($shop->tag)
						<span class="tag-text">{{ $shop->tag->label }}</span>
						@endif
						<h3><a href="{{ route('shop.show', $shop) }}" target="_blank">{{ $shop->title }}</a></h3>
						<p>{{ $shop->short_description }}</p>
						<div class="btm-row"><a href="#" class="c-btn">Request for quotes</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#load-more').click(function() {
	        var button = $(this);
	        var page = button.data('page');

	        $.ajax({
	            url: '{{ route("shop.index") }}',
	            type: 'GET',
	            data: { page: page },
	            success: function(response) {
	                $('#post-container').append(response.html);

	                if (response.next_page) {
	                    button.data('page', response.next_page);
	                } else {
	                    button.remove(); // No more pages
	                }
	            }
	        });
	    });
	});
</script>
@endsection