@component('admin/layouts.content', ['title' => 'فرم ایجاد صفحه جدید'])

    @slot('breadcrumb')
         <li class="breadcrumb-item "> <a href="{{route('admin.')}}">پنل مدیریت</a> </li>
        <li class="breadcrumb-item "><a
                href="{{ route('additionalPage.index') }}">{{ __('admin/additional_page.list_additional_pages') }}</a></li>
        <li class="breadcrumb-item active">{{ __('admin/additional_page.edit_page') }}</li>
    @endslot
    @slot('script')
        <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
        <script>
            var options = {
                filebrowserImageBrowseUrl: '/filemanager?type=Images',
                filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/filemanager?type=Files',
                filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
            };
            CKEDITOR.replace('description2', options);

        </script>
    @endslot

    @slot('buttonBox')
         <a href="{{ route('additionalPage.index') }}" class="btn btn-default"><i class="fa fa-reply"></i></a>
        <button type="submit" form="creat-form" class="btn btn-primary"><i class="fa fa-save"></i></button>
    @endslot

    <div>
        <div>
            {{-- header title --}}
            <div>
                <h4>
                    ویرایش صفحه
                </h4>
                <div>
                    <a href="{{ route('additionalPage.index') }}">
                        <i></i>
                        <span> لغو </span>
                    </a>
                    <button type="submit">ثبت </button>
                </div>
            </div>

            {{-- edit form starts --}}
            <form id="creat-form" method="POST" action="{{ route('additionalPage.update', $additionalPage->id) }}">
                @csrf
                @method('PATCH')
                <div>
                    {{--page name--}}
                    <div>
                        <div>
                            <label for="input-name">{{ __('admin/additional_page.name_page') }}</label>
                            <input type="text" name="name" value="{{ $additionalPage->name }}"
                                id="input-name">
                            @error('name')
                                <span role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label for="input-slug">{{ __('admin/additional_page.link_page') }}</label>
                            <input type="text" name="slug" value="{{ $additionalPage->slug }}"
                                id="input-slug">
                        </div>
                    </div>

                    {{-- more info textarea --}}
                    <div>
                        <label for="input-description">{{ __('admin/additional_page.description') }}
                        </label>
                        <textarea name="description" id="description2" cols="30" rows="10">{{ $additionalPage->description }}</textarea>
                    </div>

                    {{-- title --}}
                    <div >
                        <div >
                            <label for="input-meta_title">{{ __('admin/additional_page.meta_title') }}</label>
                            <input type="text" name="meta_title" value="{{ $additionalPage->meta_title }}"
                                id="input-meta_title">
                        </div>
                    </div>

                    {{-- title textarea --}}
                    <div>
                        <label for="input-meta_description">{{ __('admin/additional_page.meta_description') }}</label>
                        <textarea name="meta_description" id="meta_description" cols="30" rows="3">{{ $additionalPage->meta_description }}</textarea>

                    </div>

                    {{-- condition --}}
                    <div >
                        <div>
                            <label for="status">{{ __('admin/additional_page.status') }}
                            </label>
                            <select name="status" id="status">
                                <option value="0" {{ $additionalPage->status == 0 ? 'selected' : '' }}>
                                    {{ __('app.deactive') }}</option>
                                <option value="1" {{ $additionalPage->status == 1 ? 'selected' : '' }}>
                                    {{ __('app.active') }}</option>
                            </select>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

@endcomponent
