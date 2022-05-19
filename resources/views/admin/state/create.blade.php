@push('child-style')
@endpush
@push('script-library')
@endpush
@component('admin.layouts.content', ['title' => 'لیست استان ها'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li>
        <li class="breadcrumb-item "><a href="{{ route('state.index') }}">لیست استان ها</a></li>
        <li class="breadcrumb-item active">افزودن استان</li>
    @endslot
    @slot('buttonBox')
         <a href="{{ route('state.index') }}" class="btn btn-default"><i class="fa fa-reply"></i></a>
         <button type="submit" form="edit-form" class="btn btn-primary"><i class="fa fa-save"></i></button>
    @endslot

    <form action="{{ route('state.store') }}" id="edit-form" method="POST" class="">
        @csrf
        <div>
            <div>
                {{-- title header --}}
                <div>
                    <h3>صفحه ایجاد</h3>
                    <div>
                        <a href="{{ route('state.index') }}">
                            <i></i>
                            <span class=""> بازگشت </span>
                        </a>
                        <button type="submit">ذخیره </button>
                    </div>
                </div>

                <div id="general">
                    <div >
                        <label for="input-name">{{ __('app.just_name') }}</label>
                        <input type="text" name="name" placeholder="نام استان" value="{{ old('name') }}" id="input-name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </form>
@endcomponent
