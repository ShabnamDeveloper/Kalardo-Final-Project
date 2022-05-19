    <script>
        $(document).ready(function() {
            let rtl = document.body.classList.contains('direction-rtl');
            $('#addStateSelect').select2({
                'palceholder': 'استان را انتخاب کنید',
                dir: rtl ? 'ltr' : 'rtl'
            });
            $('#addCitySelect').select2({
                'palceholder': 'محصول در کدام شهر قرار دارد',
                dir: rtl ? 'ltr' : 'rtl'
            });
            $(".dirChanger img").click(function() {
                rtl = document.body.classList.contains('direction-rtl');
                $('#addStateSelect').select2({
                    'palceholder': 'استان را انتخاب کنید',
                    dir: rtl ? 'ltr' : 'rtl'
                });
                $('#addCitySelect').select2({
                    'palceholder': 'محصول در کدام شهر قرار دارد',
                    dir: rtl ? 'ltr' : 'rtl'
                });
            });
        });

        function changeCityValue(event) {
            var valueBox = $('#addCitySelect');
            var stateId = $('#addStateSelect').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            });
            $.ajax({
                url: '/cities',
                type: 'POST',
                data: JSON.stringify({
                    id: stateId
                }),
                success: function(data) {
                    $("#addCitySelect option").remove();
                    var options;

                    $.each(data, function(key, value) {
                        options = options + '<option value="' + key + '">' + value +
                            '</option>';
                    });
                    $("#addCitySelect").html(options);

                }
            });
        }
    </script>
    
<div>
    <div>
        <label for="addStateSelect">نام استان</label>
        <select name="state_id" id="addStateSelect"
            onchange="changeCityValue()">
            <option value="{{ old('state_id') }}"> -- انتخاب کنید --</option>
            @foreach (\App\Models\State::all() as $state)
                <option value="{{ $state->id }}" {{ $state->id == $state_id ? 'selected' : '' }}>{{ $state->name }}
                </option>
            @endforeach
        </select>
        @error('state_id')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </div>

    <div class="w-1/2">
        <label for="addCitySelect">نام شهر</label>
        <select  name="city_id" id="addCitySelect">
            <option value="">{{ __('app.select') }}</option>
            @foreach (\App\Models\City::all() as $city)
                <option value="">{{ __('app.select') }}</option>
                <option value="{{ $city->id }}" {{ $city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}
                </option>
            @endforeach
        </select>
        @error('city_id')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </div>
</div>
