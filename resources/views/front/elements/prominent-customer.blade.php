<div class="our-client">
   <div class="container">
      <div class="textb">
         <h4>OUR CLIENTS</h4>
         <h3>Our Prominent Customers</h3>
      </div>
      <div class="tab-box">
         <div class="client-tabnav">
            <ul>
               @foreach($countries as $country)
               <li><a href="javascrit:void(0)" class="{{ $loop->first ? 'active' : '' }}" data-type="#{{ $country->label }}">{{ $country->label }}</a></li>
               @endforeach
            </ul>
         </div>
         @foreach($countries as $country)
         <div class="tab-content {{ $loop->first ? 'active' : '' }}" id="{{ $country->label }}">
            <ul>
               @foreach($country->prominents as $prominent)
               <li>
                  @if ($prominent->logo && file_exists(public_path('assets/uploads/prominents/' . $prominent->logo)))
                     <img src="{{ asset('assets/uploads/prominents/' . $prominent->logo) }}" alt="Customer Logo 1" width="134" />
                 @else
                     <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="122"  />
                 @endif
               </li>
               @endforeach
            </ul>
         </div>
         @endforeach
      </div>
   </div>
</div>