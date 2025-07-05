@if(isset($academics))
    @foreach($academics as $aerobeAcademy)
    <div class="item">
        <div class="imgb">
            <a href="{{ route('knowledge-hub.show', $aerobeAcademy->slug) }}" target="_blank">
            @if ($aerobeAcademy->thumb_img && file_exists(public_path('assets/uploads/knowledge-hubs/' . $aerobeAcademy->thumb_img)))
                <img src="{{ asset('assets/uploads/knowledge-hubs/'.$aerobeAcademy->thumb_img) }}" />
            @else
                <img src="{{ asset('img/img-dummy.jpg') }}" class="rounded me-2" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
            @endif
            </a>
        </div>

        <div class="textb">
            <span class="tag-text">{{ $aerobeAcademy->category->label ?? '' }}</span>
            <h3><a href="{{ route('knowledge-hub.show', $aerobeAcademy->slug) }}" target="_blank">{{ $aerobeAcademy->title }}</a></h3>
        
            <div class="review">
                <a  href="{{ route('knowledge-hub.show', $aerobeAcademy->slug) }}">Read More</a>
            </div>
        </div>
    </div>
  @endforeach
@endif