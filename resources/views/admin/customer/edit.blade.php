@component('admin.layouts.content', ['title' => 'ویرایش مشتری'])

    @slot('breadcrumb')
        {{-- <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li> --}}
        <li class="breadcrumb-item "><a href="{{ route('customer.index') }}">{{ __('admin/customer.list_customers') }}</a>
        </li>
        <li class="breadcrumb-item active">{{ __('admin/customer.edit_customers') }}</li>
    @endslot
    <div>
        <div>
            {{-- header title --}}
            <div>
                <h3>{{ __('admin/customer.form_edit_customer') }}</h3>
                <div>
                    <a href="{{ route('customer.index') }}">
                        <i></i>
                        <span> لغو </span>
                    </a>
                    <button type="submit">{{ __('app.update') }} </button>
                </div>
            </div>

            {{-- edit form starts --}}
            <div>
                <form action="{{ route('customer.update', $customer->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div>
                        <div>
                            <label for="input-name">{{ __('seller.label.name') }}</label>
                            <input type="text" name="name" value="{{ $customer->name }}"
                                id="input-name" placeholder="{{ __('seller.placeholder.name') }}">
                        </div>

                        <div>
                            <label for="input-phone">{{ __('seller.label.mobile') }}
                            </label>
                            <input type="text" name="phone" value="{{ $customer->phone }}"
                                id="input-phone" placeholder="{{ __('seller.placeholder.mobile') }}">
                        </div>
                    </div>

                    {{-- state and city --}}
                    <x-state-city :state="$customer->state_id" :city="$customer->city_id" />

                    {{-- company address --}}
                    <div>
                        <div>
                            <label for="input-address">{{ __('seller.label.address') }}</label>
                            <textarea type="text" name="shop_address"
                                id="input-address"
                                placeholder="{{ __('seller.placeholder.address') }}">{{ $customer->shop_address }}</textarea>
                        </div>
                    </div>

                    {{-- checkboxes --}}
                    <div>
                        <label>{{ __('app.status') }}</label>
                        <div>
                            <div>
                                <input type="radio" name="approved"
                                    value="1" {{ $customer->approved == 1 ? 'checked' : '' }}>
                                <label for="input-address">{{ __('app.active') }}</label><br>
                            </div>
                            <div>
                                <input type="radio" name="approved"
                                    value="0" {{ $customer->approved == 0 ? 'checked' : '' }}>
                                <label for="input-address">{{ __('app.deactive') }}</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endcomponent
