<div class="location">
   <div class="container">
      <div class="map"><img src="{{ asset('img/home/map/map.svg') }}" /></div>
      <div class="textb">
         <h4>WHERE WE LOCATED?</h4>
         <h3>Our Location</h3>
         <div class="box-row">
            <div class="col">
               <p>Presence in</p>
               <strong>{{ $websettingInfo->offices_in_countries }}</strong>
               <p>Countries</p>
            </div>
            <div class="col">
               <p>Customers in</p>
               <strong>{{ $websettingInfo->customers_in_countries }}</strong>
               <p>Countries</p>
            </div>
         </div>
         <ul>
            @foreach($countries as $country)
            <li>{{ \Illuminate\Support\Str::ucfirst(Str::lower($country->label)) }}</li>
            @endforeach
         </ul>
      </div>
   </div>
</div>