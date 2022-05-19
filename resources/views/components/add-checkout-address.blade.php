@push('child-script')
    <script>
        $('#mey').click(function() {
            var bodyFormData = new FormData();
            bodyFormData.append('userName', 'Fred');

            const options = {

            };
            // axios.post({
            //   url:'/address',
            //   headers : {
            //     'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
            //     'Content-Type' : 'multipart/form-data'
            //   },
            //   data: bodyFormData,
            //
            // });
            axios({
                    method: 'post',
                    url: '/address',
                    data: bodyFormData,
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(response) {
                    //handle success
                    console.log(response);
                })
                .catch(function(response) {
                    //handle error
                    console.log(response);
                });
        });

    </script>

@endpush

<div id="addAddress" role="dialog" x-show="addressModal">
    <div>
        <div  x-show="addressTab === 1">
            <div>
                <span > آدرس جدید </span>
                <button type="button"  @click="addressModal= false">
                    <i></i>
                </button>
            </div>
            <div class="relative">
                <div id="map"></div>
                {{-- <div class="center-marker absolute top-1/2 left-1/2 w-6 h-9" style="background-image: url(/images/map/download.svg)"></div> --}}
            </div>
            <div>
                <span> مرسوله شما به این آدرس ارسال خواهد شد. </span>
                <button type="button"> ثبت آدرس </button>
            </div>
        </div>

        <div x-show="addressTab === 2" role="document">
            <div class="pb-4">
                <div>
                    <div>
                        <h5  id="exampleModalLabel">ثبت آدرس جدید</h5>
                        <i @click="close"></i>
                        {{-- <button type="button" class="" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                    </div>
                </div>

                <div>
                    <div>
                        <form method="POST" id="adress_form" action="{{ route('address.store') }}" class="">
                            @csrf
                            <input type="hidden" name="approved" value="1">
                            <div>
                                <div>
                                    <label for="name">{{ __('app.name') }}</label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div >
                                    <label for="phone">{{ __('app.mobile_number') }}</label>
                                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <x-state-city />
                            <div>
                                <div >
                                    <label for="postcode" >کد پستی</label>
                                    <input type="text" name="postcode" id="postcode" value="{{ old('postcode') }}"
                                    @error('postcode')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <div>
                                    <label for="address">{{ __('app.address') }}</label>
                                    <textarea name="address" id="address"
                                        cols="30" rows="3">{{ old('address') }}</textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div>
                    <button type="button" class="" data-dismiss="modal">لفو</button>
                    <button type="submit" id="mey">ذخیره</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script>
    mapboxgl.setRTLTextPlugin(
        'https://cdn.parsimap.ir/third-party/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
        null,
    )

    const map = new mapboxgl.Map({
        container: 'map',
        style: 'https://api.parsimap.ir/styles/parsimap-streets-v11?key=p1da92855e313e4837a30b8ce589caedf94aef2dc4&service=true',
        center: [51.4, 35.7],
        zoom: 8,
    })

    const control = new ParsimapGeocoder()

    map.addControl(control)

    control.reverseLocation().then((reverse) => {
  const lngLat = reverse.lngLat
  const address = reverse.address
})
</script> --}}

<script>
    mapboxgl.setRTLTextPlugin(
        'https://cdn.parsimap.ir/third-party/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
        null,
    )
    let prelat = 51.4
    let prelng = 35.7
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'https://api.parsimap.ir/styles/parsimap-streets-v11?key=p1da92855e313e4837a30b8ce589caedf94aef2dc4&service=true',
        center: [prelat, prelng],
        zoom: 8,
    })

    const control = new ParsimapGeocoder()

    map.addControl(control)

    control.on('result', function (event) {
        // event.preventDefault()
  const lngLat = event.lngLat
  const inputString = event.inputString
  console.log(lngLat)
  console.log(inputString)
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          console.log(JSON.parse(this.responseText))
          prelat = map._easeOptions.center.lat
          prelng = map._easeOptions.center.lng
          console.log(map._easeOptions.center.lat)
      }
  };
  xhttp.open("GET",
    
    `https://api.parsimap.ir/geocode/forward?key=p19b014c5015e14532b9a819c108ad884e8d09966b&search_text=${document.querySelector('.pmi-geocoder-text-field').value}&district=10511133&only_in_district=true&subdivision=true&plate=false&request_id=false`,
      true);
  xhttp.send();
})
    control.reverseLocation().then((reverse) => {
        const lngLat = reverse.lngLat
        const address = reverse.address
        // function loadDoc() {
        // }
        // loadDoc()
    })
    console.log(address)
    // const submitted = document.querySelector('.pmi-geocoder-form')
    // submitted.addEventListener('submit', () => {
    //     console.log('kkk')
    // })
</script>
