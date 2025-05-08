@extends('layouts.app')
@section('content')
<div class="top-banner csr-banner hub">
	<div class="container">
		<div class="textb2">
			<h2>Knowledge Hub</h2>
			<p>Keep yourself more updated</p>
		</div>
		<div class="rightb">
			<div class="whiteb">
				<span class="tag-text">Tecnology</span>
				<h3>The Impact of Technology on <br/> the Workplace: How <br/> Technology is Changing</h3>
			</div>
		</div>
	</div>
</div>
<div class="mid-section">
	<div class="latest-post">
    <div class="container">
      <h2>Latest Post</h2>
      <div class="top-row">
        <div class="left-tab">
          <ul>
            <li><button type="button" class="btn active" data-target="viewall"><div id="total-academy"></div></button></li>
            @foreach($categories as $category)
               <li><button type="button" class="btn academy-count" data-count="{{ $category->knowledgeHubs->count() }}" data-target="cate-{{ $category->label }}">{{ $category->label }} ({{ $category->knowledgeHubs->count() }})</button></li>
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

      @foreach($categories as $category)  
      <div class="items-container grid-view active" id="cate-{{ $category->label }}">
         @foreach($category->knowledgeHubs as $knowledgeHub)
         <div class="item">
          <div class="imgb">
            @if ($knowledgeHub->image && file_exists(public_path('assets/uploads/knowledge-hubs/' . $knowledgeHub->image)))
               <img src="{{ asset('assets/uploads/knowledge-hubs/'.$knowledgeHub->image) }}" />
            @else
               <img src="{{ asset('img/img-dummy.jpg') }}" />
            @endif
            <div class="img-tag">Latest</div></div>
          <div class="textb">
            <span class="tag-text">{{ $category->label }}</span>
            <h3><a href="#"> {{ $knowledgeHub->short_description }}</a></h3>
            <div class="review">
              <p style="display: block;"><span>1,234</span> views <img src="{{ asset('img/dot.jpg') }}" /> <span>56</span> likes</p>
              <a  href="#">Read More</a>
            </div>
            <div class="user-info">
              <div class="icon"><img src="{{ asset('img/icon-dummy.png') }}" /></div>
              <p><span> {{ $knowledgeHub->author_name }} </span><img src="{{ asset('img/dot.jpg') }}" /> {{ $knowledgeHub->event_date }}</p>
            </div>
          </div>
        </div>
        @endforeach
        </div>
      @endforeach

      <div class="btn-row">
        <a href="#">View All Post</a>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
var sum = 0;
$('.academy-count').each(function(){
    sum += parseFloat($(this).data('count'));  // Or this.innerHTML, this.innerText
});
$('#total-academy').html('All ('+sum+ ')');
</script>
@endsection