<div class="testimonials">
  <div class="container">
     <div class="title">
        <h4>CUSTOMER TESTIMONIALS</h4>
        <h3>What our customers say</h3>
     </div>
     <div class="column testimonials-slide">
        @foreach($testimonials as $testimonial)
        <div class="col">
           <div class="user">
              @if ($testimonial->image && file_exists(public_path('assets/uploads/testimonials/' . $testimonial->image)))
                  <img src="{{ asset('assets/uploads/testimonials/'.$testimonial->image) }}" />
               @else
                  <img src="{{ asset('assets/images/no-image.png') }}" class="w-full h-full object-cover" width="150" height="120"  data-holder-rendered="true" />
               @endif
           </div>
           <h4>{{ $testimonial->label }}</h4>
           <p>{{ $testimonial->description }}</p>
        </div>
        @endforeach
     </div>
  </div>
</div>