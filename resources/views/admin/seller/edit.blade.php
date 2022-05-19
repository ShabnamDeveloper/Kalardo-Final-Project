@component('admin.layouts.content', ['title' => 'ویرایش فروشنده'])

    @slot('breadcrumb')
        {{-- <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li> --}}
        <li class="breadcrumb-item "><a href="{{ route('seller.index') }}">لیست فروشنده ها</a></li>
        <li class="breadcrumb-item active">ویرایش فروشنده</li>
    @endslot
    <div>
        <div>
            {{-- header title --}}
            <div>
                <h3>
                    فرم ویرایش فروشنده
                </h3>
                <div>
                    <a href="{{ route('seller.index') }}">
                        <i></i>
                        <span class=""> لغو </span>
                    </a>
                    <button type="submit">
                        {{ __('app.update') }} </button>
                </div>
            </div>

            {{-- edit form starts --}}
            <form action="{{ route('seller.update', $user->id) }}" method="POST" class="">
                @csrf
                @method('PATCH')
                <div>
                    {{-- name info --}}
                    <div>
                        <div>
                            <label for="input-name">{{ __('seller.label.name') }}</label>

                            <input type="text" name="name" value="{{ $user->name }}"
                                id="input-name" placeholder="{{ __('seller.placeholder.name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        {{-- phone --}}
                        <div>
                            <label for="input-phone">{{ __('seller.label.mobile') }}
                            </label>
                            {{-- <div class="col-12"> --}}
                            <input type="text" name="phone" value="{{ $user->phone }}"
                                id="input-phone" placeholder="{{ __('seller.placeholder.mobile') }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                            {{-- </div> --}}
                        </div>
                    </div>

                    {{-- store info --}}
                    <div>
                        <div>
                            <label for="input-shop_name">{{ __('seller.label.shop_name') }}</label>
                            <input type="text" name="shop_name" value="{{ $user->shop_name }}"
                                id="input-shop_name" placeholder="{{ __('seller.placeholder.shop_name') }}">
                            @error('shop_name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        {{-- phone --}}
                        <div>
                            <label for="input-shop_phone">{{ __('seller.label.shop_phone') }}</label>
                            <input type="text" name="shop_phone" value="{{ $user->shop_phone }}"
                                id="input-shop_phone" placeholder="{{ __('seller.placeholder.shop_phone') }}">
                            @error('shop_phone')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- select city --}}
                    <x-state-city :state="$user->state_id" :city="$user->city_id" />

                    {{-- address for store --}}
                    <div>
                        <label for="input-address">{{ __('seller.label.address') }}</label>
                        <textarea type="text" name="shop_address"
                            id="input-address"
                            placeholder="{{ __('seller.placeholder.address') }}">{{ $user->shop_address }}</textarea>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    {{-- bank info --}}
                    <div>
                        <div >
                            <label for="input-bank_name"
                            >{{ __('seller.label.bank_name') }}</label>
                            <input type="text" name="bank_name" value="{{ $user->bank_name }}"
                                id="input-bank_name" placeholder="{{ __('seller.placeholder.bank_name') }}">
                            @error('bank_name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label for="input-bank_account_number">{{ __('seller.label.bank_account_number') }}</label>
                            <input type="text" name="bank_account_number" value="{{ $user->bank_account_number }}"
                                id="input-bank_account_number"
                                placeholder="{{ __('seller.placeholder.bank_account_number') }}">
                            @error('bank_account_number')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- bank card info --}}
                    <div>
                        <div>
                            <label for="input-bank_cart_number">{{ __('seller.label.bank_cart_number') }}</label>
                            <input type="text" name="bank_cart_number" value="{{ $user->bank_cart_number }}"
                                id="input-bank_cart_number"
                                placeholder="{{ __('seller.placeholder.bank_cart_number') }}">
                            @error('bank_cart_number')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label>{{ __('seller.label.bank_shaba_number') }}</label>
                            <input type="text" name="bank_shaba_number" value="{{ $user->bank_shaba_number }}"
                                id="input-bank_shaba_number"
                                placeholder="{{ __('seller.placeholder.bank_shaba_number') }}">
                            @error('bank_shaba_number')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- radio buttons --}}
                    <div>
                        <label>{{ __('app.status') }}</label>
                        <div >
                          <div>
                            <input type="radio" name="approved" value="1"
                                {{ $user->approved == 1 ? 'checked' : '' }}>
                            <label for="input-address">{{ __('app.active') }}</label>
                          </div>
                          <div >
                            <input type="radio" name="approved" value="0"
                                {{ $user->approved == 0 ? 'checked' : '' }}>
                            <label for="input-address">{{ __('app.deactive') }}</label>
                          </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endcomponent
