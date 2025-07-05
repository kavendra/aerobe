@extends('layouts.app')
@section('content')

<div class="top-banner news">
     @if ($shopPage->banner_image && file_exists(public_path('assets/uploads/cms-pages/' . $shopPage->banner_image)))
            <img src="{{ asset('assets/uploads/cms-pages/'.$shopPage->banner_image) }}" />
         @else
            <img src="{{ asset('img/img-dummy.jpg') }}" class="rounded me-2" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
         @endif
    <div class="textb2">
        <div class="container">
            <h2>{{ $shopPage->banner_title }}</h2>
            <p>{!! $shopPage->banner_desc !!}</p>
        </div>
    </div>
</div>
<div class="mid-section">
	<div class="latest-post">
		<div class="container">
			<h2>Shop</h2>
			<div class="top-row">
               <div class="left-tab">
                 <ul>
                   <li><button type="button" class="btn academy-list active" data-target="viewall">All ({{ $total }})</button></li>
                   @foreach($categories as $category)
                     @if($category->knowledgeHubs->count())
                      <li><button type="button" class="btn academy-list" data-category="{{ $category->id }}">{{ $category->label }} ({{ $category->shops->count() }})</button></li>
                     @endif
                   @endforeach
                 </ul>
               </div>
               <div class="right-tab">
                 <ul>
                   <li class="active" id="gridBtn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><rect width="7" height="7" x="3" y="3" rx="1"></rect><rect width="7" height="7" x="14" y="3" rx="1"></rect><rect width="7" height="7" x="14" y="14" rx="1"></rect><rect width="7" height="7" x="3" y="14" rx="1"></rect></svg></li>
                   <li id="listBtn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><line x1="8" x2="21" y1="6" y2="6"></line><line x1="8" x2="21" y1="12" y2="12"></line><line x1="8" x2="21" y1="18" y2="18"></line><line x1="3" x2="3.01" y1="6" y2="6"></line><line x1="3" x2="3.01" y1="12" y2="12"></line><line x1="3" x2="3.01" y1="18" y2="18"></line></svg></li>
                 </ul>
               </div>
             </div>
			<div class="shoplist" id="post-container">
				@foreach($shops as $shop)
				@include('front.shop.item', ['shops' => [$shop]])
				@endforeach
			</div>
			<div class="btn-row" style="padding-top: 38px;">
                <button id="load-more" data-page="2" class="c-btn" data-load="1" @if($total < 11) style="display: none;" @endif>Load More</button>
            </div>
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
	    /*$('#load-more').click(function() {
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
	    });*/
	    
	    $('#load-more, .academy-list').click(function() {
           var button = $(this);
           let page = button.data('page') ?? 0;
           let activeCategory = $('.academy-list.active').data('category');
           $.ajax({
               url: '{{ route("shop.index") }}',
               type: 'GET',
               data: { page: page, category_id:activeCategory },
               success: function(response) {
                    if(response.total > 10){
                        $('#load-more').show();
                    }
                   if(!button.data('load')) {
                      $('#post-container').html(response.html);
                   }else{
                      $('#post-container').append(response.html);
                      if (response.hasMorePages) {
                          button.data('page', response.nextPage).text('Load More');
                      } else {
                          $('#load-more').hide(); // No more pages
                      }
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