@if(isset($academics))
   @foreach($academics as $aerobeAcademy)
   <div class="item">
    <div class="imgb">
      <a href="{{ route('academy.show', $aerobeAcademy->slug) }}" target="_blank">
         @if ($aerobeAcademy->image && file_exists(public_path('assets/uploads/aerobe-academies/' . $aerobeAcademy->image)))
            <img src="{{ asset('assets/uploads/aerobe-academies/'.$aerobeAcademy->image) }}" />
         @else
            <img src="{{ asset('img/img-dummy.jpg') }}" class="rounded me-2" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
         @endif
      </a>
    </div>
    <div class="textb">
      <span class="tag-text">{{ $aerobeAcademy->category->label }}</span>
      <h3><a href="{{ route('academy.show', $aerobeAcademy->slug) }}" target="_blank">{{ $aerobeAcademy->title }}</a></h3>
      <!--<p style="display: block;"> {{ $aerobeAcademy->short_description }}</p>-->
      <div class="review">
        <a  href="#">Read More</a>
      </div>
    </div>
  </div>
  @endforeach
@endif