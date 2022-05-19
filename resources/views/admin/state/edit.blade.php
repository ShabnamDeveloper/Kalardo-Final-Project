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
         <button type="submit" form="edit-form" class="btn btn-primary"><i class="fa fa-save"></i></button>
    @endslot

    <form action="{{ route('state.update', $state->id) }}" id="edit-form" method="POST" class="">
        @csrf
        @method('PATCH')

        <div id="general">
            <div>
                {{-- title header --}}
                <div>
                    <h3>صفحه تغییر</h3>
                    <div>
                        <a href="{{ route('state.index') }}">
                            <i></i>
                            <span class=""> بازگشت </span>
                        </a>
                        <button type="submit">ذخیره </button>
                    </div>
                </div>

                <div>
                    <div>
                        <label for="input-name">{{ __('app.just_name') }}</label>
                        <input type="text" name="name" placeholder="نام استان" value="{{ $state->name }}"
                            id="input-name">
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
