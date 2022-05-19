@section('link')
<link rel="stylesheet" href="{{asset('plugins/owlcarousel/assets/owl.carousel.min.css')}}">
@endsection
@section('script')
    <script src="{{asset('plugins/owlcarousel/owl.carousel.min.js')}}"></script>
    <script>
        $("#slider_{{$slider->id}}").owlCarousel({
            // animateOut: 'slideOutDown',
            // animateIn: 'flipInX',
            items:1,
            // stagePadding:50,
            singleItem:!0,
            navigation:!0,
            navigationText:['<i class="fa fa-chevron-left fa-5x"></i>','<i class="fa fa-chevron-right fa-5x"></i>'],
            pagination:!0,
            loop:!0,
            margin:10,
            autoplay:!0,
            autoplayTimeout:3000,
            autoplayHoverPause:!0,
            responsiveClass:!0,
            responsive:{
                0:{
                    items:1,
                    nav:!1,
                    stagePadding:0
                },
                400:{
                    items:1,
                    nav:!1,
                    stagePadding:0
                },768:{
                    items:1,
                    nav:!1,
                    pagination:!0,
                }
            }
        });
    </script>   
@endsection
<div id="slider_{{$slider->id}}" dir="ltr">
    @foreach ($slider->bannerImages as $banners )
        <div >
            @if ($banners['url'])
                <a href="{{$banners['url']}}">
                    <img src="{{$banners['images']}}">
                </a>
            @else
                <img src="{{$banners['images']}}">
            @endif
        </div>
    @endforeach
</div>

        