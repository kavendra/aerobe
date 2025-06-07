@extends('layouts.app')
@section('content')
<div class="mid-section">
  <!--<div class="course">-->
  <!--  <div class="container">-->
  <!--    <div class="textb">-->
  <!--      <h4>Let's <strong>Begin</strong></h4>-->
  <!--      <h3>Let's Find The Right Course For you</h3>-->
  <!--      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br/>Etiam dignissim, sem non convallis molestie.</p>-->
  <!--    </div>-->
  <!--    <div class="imgb">-->
  <!--      <img src="{{ asset('img/hero-academy.svg') }}" alt="" />-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->
<div class="top-banner csr-banner hub">
		 @if ($aerobeAcademicsPage->banner_image && file_exists(public_path('assets/uploads/cms-pages/' . $aerobeAcademicsPage->banner_image)))
            <img src="{{ asset('assets/uploads/cms-pages/'.$aerobeAcademicsPage->banner_image) }}" />
         @else
            <img src="{{ asset('img/img-dummy.jpg') }}" class="rounded me-2" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
         @endif
		<div class="innerb">
		<div class="container">
			<div class="textb2">
				<h2>{{ $aerobeAcademicsPage->banner_title }}</h2>
				<p>{!! $aerobeAcademicsPage->banner_desc !!}</p>
			</div>
			<div class="rightb">
				<div class="whiteb">
					<span class="tag-text">{{ $aerobeAcademicsMain->category->label ?? '' }}</span>
					<h3>{!! $aerobeAcademicsMain->title ?? '' !!}</h3>
				</div>
			</div>
	</div>
	</div>
</div>
  <div class="latest-post">
    <div class="container">
      <h2>Latest Post</h2>
      <div class="top-row">
        <div class="left-tab">
          <ul>
            <li><button type="button" class="btn academy-list active" data-target="viewall">All ({{ $total }})</button></li>
            @foreach($categories as $category)
              @if($category->aerobeAcademy->count())
               <li><button type="button" class="btn academy-list" data-category="{{ $category->id }}">{{ $category->label }} ({{ $category->aerobeAcademy->count() }})</button></li>
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

      <div class="items-container grid-view active" id="post-container">
         @foreach($aerobeAcademics as $aerobeAcademy)
            @include('front.academy.item', ['academics' => [$aerobeAcademy]])
         @endforeach
      </div>
      <div class="btn-row" style="padding-top: 38px;">
         <button id="load-more" data-page="2" class="c-btn" data-load="1" @if($total < 7) style="display: none;" @endif>Load More</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
   var sum = 0;
   $('.academy-count').each(function(){
       sum += parseFloat($(this).data('count'));  // Or this.innerHTML, this.innerText
   });
      $('#total-academy').html('All ('+sum+ ')');

   $('#load-more, .academy-list').click(function() {
       var button = $(this);
       let page = button.data('page') ?? 0;
       let activeCategory = $('.academy-list.active').data('category');
       $.ajax({
           url: '{{ route("academy.index") }}',
           type: 'GET',
           data: { page: page, category_id:activeCategory },
           success: function(response) {
               if(response.total > 6){
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
  });
</script>
@endsection