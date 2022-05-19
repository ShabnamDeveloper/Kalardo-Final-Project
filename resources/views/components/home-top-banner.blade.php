@foreach ($bannerInfo->bannerImages as $banners )
    @if ($banners['url'])
        <a href="{{$banners['url']}}" class="d-block">
            <img src="{{$banners['images']}}" alt="" class="img-fluid">
        </a>
    @else
        <img src="{{$banners['images']}}" alt="" class="img-fluid">
    @endif
@endforeach