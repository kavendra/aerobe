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
			<h2>Shop</h2>
			<div class="shoplist" id="post-container">
				@foreach($shops as $shop)
				@include('front.shop.item', ['shops' => [$shop]])
				@endforeach
			</div>
			@if($total > $perPage)
			<div class="btn-row" style="padding-top: 38px;">
				<button id="load-more" data-page="{{$perPage}}" class="c-btn">Load More</button>
			</div>
			@endif
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