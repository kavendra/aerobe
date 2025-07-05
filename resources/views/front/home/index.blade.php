@extends('layouts.app')

@section('content')
<div class="mid-section">
    <div class="healthcare">
        <div class="container">
            <div class="textb">
                <h1>
                    @if($countryName == 'INDIA')
                        {!! $homePage->in_banner_title !!}
                    @elseif($countryName == 'SINGAPORE')
                        {!! $homePage->sg_banner_title !!}
                    @elseif($countryName == 'AUSTRALIA')
                        {!! $homePage->au_banner_title !!}
                    @elseif($countryName == 'MALAYSIA')
                        {!! $homePage->my_banner_title !!}
                    @else
                        {!! $homePage->gb_banner_title !!}
                    @endif
                </h1>
                <p>{{ $homePage->banner_desc }}</p>
                <a href="javascript:;" class="c-btn our-portfolio">{{ $homePage->banner_button_text }}</a>
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
                @if ($homePage->section_image1 && file_exists(public_path('assets/uploads/cms-pages/' . $homePage->section_image1)))
                  <img src="{{ asset('assets/uploads/cms-pages/'.$homePage->section_image1) }}" />
                @else
                    <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
                @endif
            </div>

            <div class="textb">
                <h4>{!! $homePage->section_heading !!}</h4>
                <h3>{!! $homePage->section_title !!}</h3>
                <p>{!! $homePage->section_desc !!}.</p>
                <a href="{{ url('about-us') }}" class="c-btn">Explore More</a>
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
            @if($newsAndEventsFirst)
                @php($featuredNewsAndEvent = $newsAndEventsFirst)
                <div class="imgb">
                    <a href="{{ !empty($featuredNewsAndEvent->link) ? $featuredNewsAndEvent->link : route('news-event.show', $featuredNewsAndEvent->slug) }}" target="_blank">
                    @if ($featuredNewsAndEvent->main_img && file_exists(public_path('assets/uploads/news-events/' . $featuredNewsAndEvent->main_img)))
                        <img src="{{ asset('assets/uploads/news-events/'.$featuredNewsAndEvent->main_img) }}" style="max-width: none" />
                    @else
                        <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
                    @endif
                    </a>

                    <div class="caption">
                        @if($featuredNewsAndEvent->tag)
                            <div class="tag-box">{{ $featuredNewsAndEvent->tag->label }}</div>
                        @endif
                        <h3><a href="{{ !empty($featuredNewsAndEvent->link) ? $featuredNewsAndEvent->link : route('news-event.show', $featuredNewsAndEvent->slug) }}" target="_blank">{{ $featuredNewsAndEvent->title }}</a></h3>
                        
                        <div class="user">
                            <p>{{ $featuredNewsAndEvent->event_date }}</p>
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
                                    
                                    <h3><a href="{{ !empty($newsAndEvent->link) ? $newsAndEvent->link : route('news-event.show', $newsAndEvent->slug) }}" target="_blank"> {{ $newsAndEvent->title ?? '' }}</a></h3>

                                    <div class="user">
                                       <p>{{ $newsAndEvent->event_date }}</p>
                                    </div>
                                </div>

                                <div class="imgb">
                                    <a href="{{ !empty($newsAndEvent->link) ? $newsAndEvent->link : route('news-event.show', $newsAndEvent->slug) }}" target="_blank">
                                        @if ($newsAndEvent->thumb_img && file_exists(public_path('assets/uploads/news-events/' . $newsAndEvent->thumb_img)))
                                          <img src="{{ asset('assets/uploads/news-events/'.$newsAndEvent->thumb_img) }}" />
                                        @else
                                            <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
                                        @endif
                                    </a>
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
