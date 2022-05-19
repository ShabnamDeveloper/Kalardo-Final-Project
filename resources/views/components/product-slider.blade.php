@push('child-script')
<script> 
    $("#productGroup_{{$productInfo->id}}").owlCarousel({
        items:4,
        loop:!0,
        margin:10,
        pagination:!0,
        autoplay:!0,
        dots:1,
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
                items:4,
                nav:1,
                pagination:1,
                stagePadding:50
            }
        }
    });
</script>
@endpush

<div id="productGroup_{{$productInfo->id}}" dir="ltr">
    @foreach ($productInfo->products as $product)
        <div>
            <a href="{{$product['slug']}}">
                <img src="{{route('thumb',['url'=>$product['image'],'w'=>270,'h'=>270])}}" alt="">
                <h4>{{$product['name']}}</h4>
            </a>
             @if (!is_null($sellerActive->min('price')))
                <h5 class="price">{{getPrice($sellerActive->min('price'))}}</h5>
            @else
                <h5 class="unavailable">ناموجود</h5>
            @endif
        </div>
    @endforeach
</div>
