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
      <h2>Knowledge Hub Detail</h2>
      <div class="items-container grid-view active">
         <div class="item">
          <div class="imgb">
            @if ($knowledgeHub->image && file_exists(public_path('assets/uploads/aerobe-academies/' . $knowledgeHub->image)))
               <img src="{{ asset('assets/uploads/aerobe-academies/'.$knowledgeHub->image) }}" />
            @else
               <img src="{{ asset('img/img-dummy.jpg') }}" class="rounded me-2" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
            @endif
          </div>
          <div class="textb">
            <span class="tag-text">{{ $knowledgeHub->category->label ?? '' }}</span>
            <h3><a href="#"> {{ $knowledgeHub->short_description }}</a></h3>
            <div class="review">
              <p style="display: block;"><span>1,234</span> views <img src="{{ asset('img/dot.jpg') }}" /> <span>56</span> likes</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection