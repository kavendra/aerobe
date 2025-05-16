@extends('layouts.app')

@section('content')
   <div class="mid-section">
   <div class="healthcare">
      <div class="container">
      <div class="textb">
         <h1>{!! $homePage->banner_title !!}</h1>
         <p>{{ $homePage->banner_desc }}</p>
         <a href="#" class="c-btn">{{ $homePage->banner_button_text }}</a>
      </div>
      <div class="imgb">
         @if ($homePage->banner_image && file_exists(public_path('assets/uploads/cms-pages/' . $homePage->banner_image)))
            <img src="{{ asset('assets/uploads/cms-pages/' . $homePage->banner_image) }}" />
          @else
              <img src="{{ asset('assets/images/no-image.png') }}" class="rounded me-2" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
          @endif
      </div>
   </div>
   </div>
   <div class="who-we-are">
      <div class="container">
         <div class="imgb">
            @if ($homePage->section_image1 && file_exists(public_path('assets/uploads/home-page/' . $homePage->section_image1)))
              <img src="{{ asset('assets/uploads/home-page/'.$homePage->section_image1) }}" />
            @else
                <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
            @endif
         </div>
         <div class="textb">
            <h4>{!! $homePage->section_heading !!}</h4>
            <h3>{!! $homePage->section_title !!}</h3>
            <p>{!! $homePage->section_desc !!}.</p>
            <a href="#" class="c-btn">Explore More</a>
         </div>
      </div>
   </div>
   <div class="portfolio">
      <div class="container">
         <div class="title">
            <h4>OUR PORTFOLIO</h4>
            <h3>Our Business Verticals</h3>
         </div>
         <ul>
            @foreach($businessVerticals as $businessVertical)
            <li>
               @if ($businessVertical->logo && file_exists(public_path('assets/uploads/business-verticals/' . $businessVertical->logo)))
                <img src="{{ asset('assets/uploads/business-verticals/'.$businessVertical->logo) }}" />
                @else
                   <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="20"  data-holder-rendered="true" />
               @endif
               <h3>{{ $businessVertical->label }}</h3>
            </li>
            @endforeach
         </ul>
      </div>
   </div>
   @include('front.elements.newsletter')
   @include('front.elements.location')
   
   <!-- Prominent Customers -->
   @include('front.elements.prominent-customer')
   <div class="news-event">
      <div class="container">
         <div class="title">
            <h4>NEWS & EVENTS</h4>
            <h3>News & Events</h3>
         </div>
         <div class="column">
          @if($newsAndEvents->first())
            @php($featuredNewsAndEvent = $newsAndEvents->first())
            <div class="imgb">
               @if ($featuredNewsAndEvent->author_image && file_exists(public_path('assets/uploads/news-events/' . $featuredNewsAndEvent->image)))
                <img src="{{ asset('assets/uploads/news-events/'.$featuredNewsAndEvent->image) }}" />
              @else
                  <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
              @endif
               <div class="caption">
                  @if($featuredNewsAndEvent->tag)
                  <div class="tag-box">{{ $featuredNewsAndEvent->tag->label }}</div>
                  @endif
                  <h3>{{ $featuredNewsAndEvent->short_description }}</h3>
                  <div class="user">
                     <div class="icon-img">
                        @if ($featuredNewsAndEvent->image && file_exists(public_path('assets/uploads/news-events/' . $featuredNewsAndEvent->image)))
                         <img src="{{ asset('assets/uploads/news-events/'.$featuredNewsAndEvent->image) }}" />
                       @else
                           <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
                       @endif
                     </div>
                     <p>{{ $featuredNewsAndEvent->author_name ?? '' }} {{ $featuredNewsAndEvent->event_date }}</p>
                  </div>
               </div>
            </div>
          @endif  
            <div class="news-list">
               <ul>
                  @foreach($newsAndEvents as $newsAndEvent)
                  <li>
                     <div class="textb">
                        @if($newsAndEvent->tag)
                        <div class="tag-box">{{ $newsAndEvent->tag->label ?? '' }}</div>
                        @endif
                        <h3><a href="#"> {{ $newsAndEvent->title ?? '' }}</a></h3>
                        <p><strong>4.83k</strong> views <strong>3.27k</strong> likes</p>
                        <div class="user">
                           <div class="icon-img">
                              @if ($newsAndEvent->author_image && file_exists(public_path('assets/uploads/news-events/' . $newsAndEvent->author_image)))
                                 <img src="{{ asset('assets/uploads/news-events/'.$newsAndEvent->author_image) }}" />
                              @else
                                 <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
                              @endif
                           </div>
                           <p>BY <strong>{{ $newsAndEvent->author_name ?? '' }}</strong> <span>·</span> {{ $newsAndEvent->event_date }}</p>
                        </div>
                     </div>
                     <div class="imgb">
                    @if ($newsAndEvent->image && file_exists(public_path('assets/uploads/news-events/' . $newsAndEvent->image)))
                      <img src="{{ asset('assets/uploads/news-events/'.$newsAndEvent->image) }}" />
                    @else
                        <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
                    @endif
                     </div>
                  </li>
                  @endforeach
               </ul>
               @if($newsAndEvents->count() > 3)
               <a href="{{ route('news-event.index') }}" class="c-btn">View All</a>
               @endif
            </div>
         </div>
      </div>
   </div>
   @include('front.elements.testimonial')
</div>
@endsection
