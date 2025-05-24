@extends('layouts.app')
@section('content')
<div class="top-banner csr-banner shop-b">
	<img src="{{ asset('img/hero-work.jpg') }}" />
	<div class="textb2">
		<div class="container">
			<h2>Shop</h2>
			<p>Be part of a team that's revolutionizing rural healthcare through innovative telemedicine solutions.</p>
		</div>
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
			@if($total > 6)
			<div class="btn-row" style="padding-top: 38px;">
				<button id="load-more" data-page="2" class="c-btn">Load More</button>
			</div>
			@endif
		</div>
	</div>
</div>

<div class="request-quotes request-p">
	<form id="requestForm">
    @csrf
		<div class="innerb">
			<div class="close-btn">
				<img src="{{ asset('img/close-btn.svg') }}" />
			</div>
			<p style="padding-bottom:2px; color: green;" id="request-successs"></p>
			<div class="col-f">
				<label>Full Name</label>
				<input type="text" name="name" class="input" placeholder="John Doe" required>
			</div>
			<div class="col-f">
				<label>Email Address</label>
				<input type="email" name="email" class="input" placeholder="example@company.com" required>
			</div>
			<div class="col-f">
				<label>Country </label>
				<select id="country" name="country" class="select" required>
					<option value="">-- Please choose an option --</option>
					<option value="us">United States</option>
					<option value="in">India</option>
					<option value="uk">United Kingdom</option>
					<option value="ca">Canada</option>
					<option value="au">Australia</option>
					<option value="de">Germany</option>
					<option value="fr">France</option>
					<option value="jp">Japan</option>
					<option value="cn">China</option>
				</select>
			</div>
			<div class="col-f">
				<label>Mobile Number</label>
				<input type="text" name="phone" class="input" placeholder="+91 9876543210" required>
			</div>
			<div class="col-f">
				<label>Description</label>
				<textarea class="textarea" name="description" placeholder="Brief description of your current role and responsibilities" required></textarea>
			</div>
			<div class="col-f">
				<button class="c-btn" type="submit">Submit Request</button>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
	$(document).ready(function() {
	    $('#load-more').click(function() {
	        var button = $(this);
	        let page = button.data('page');

	        $.ajax({
	            url: '{{ route("shop.index") }}',
	            type: 'GET',
	            data: { page: page },
	            success: function(response) {
	                $('#post-container').append(response.html);

	                if (response.hasMorePages) {
                    	button.data('page', response.nextPage).text('Load More');
	                } else {
	                    button.remove(); // No more pages
	                }
	            }
	        });
	    });

	    $('.pop-o').click(function () {
		   var curdata = "."+$(this).attr("data-type");
		   $(curdata).addClass("active");
		  });

		  $('.request-quotes .innerb .close-btn').click(function () {
		   $(".request-quotes").removeClass("active");
		});

		$('#requestForm').on('submit', function(e) {
            e.preventDefault();
            $('#send-us').addClass('disabled');
            $.ajax({
                url: '{{ route('shop.store') }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#send-us').removeClass('disabled');
                    $('#request-successs').text(response.message).fadeIn();
                    $('.clear-form').val('');
                    setTimeout(function() {
                        $('#request-successs').fadeOut();
                    }, 3000); // 3 seconds
                    setTimeout(function() {
                        $('.request-p').removeClass('active');
                    }, 4000); // 4 seconds
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    alert(Object.values(errors).join("\n"));
                }
            });
        });
	});
</script>
@endsection