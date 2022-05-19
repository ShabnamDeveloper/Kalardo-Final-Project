@component('admin.layouts.content')
    <div>
        {{-- header title --}}
            <div>
                <h4>{{ __('admin/category.add') }}</h4>
                <div>
                    <a href="{{ route('category.index') }}">
                        <i></i>
                        <span class=""> {{ __('general.back') }} </span>
                    </a>
                    <button type="submit">
                        {{ __('general.save') }} </button>
                </div>
            </div>

            <form action="{{ route('category.store') }}" id="edit-form" method="POST" class="">
                @csrf
                <div>
                    {{-- name --}}
                    <div>
                        <div>
                            <label>{{ __('general.name') }}</label>
                            <input type="text" name="persian_name" value="{{ old('name') }}"/>
                        </div>

                        <div>
                            <label>{{ __('general.slug') }}</label>
                            <input type="text" name="english_name" value="{{ old('slug') }}"
                                placeholder="{{ __('general.slug') }}">
                            @error('slug')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    {{-- detail --}}
                    <div>
                        <div>
                            <label for="input-description">{{ __('general.description') }}</label>
                            <textarea type="text" cols="30" rows="10" placeholder="{{ __('general.description') }}"
                                name="description"
                                id="input-description">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    {{-- select --}}
                    <div>
                        <div>
                            <label for="input-status">{{ __('admin/category.parent') }}</label>
                            <select name="status">
                                <option value="0">{{ __('admin/category.parent') }}</option>
                            </select>
                        </div>
                        <div>
                            <label for="input-meta_title">{{ __('general.meta_title') }}</label>
                            <input type="text" name="meta_title" placeholder="{{ __('general.meta_title') }}"
                                value="{{ old('meta_title') }}" id="input-meta_title">
                        </div>
                    </div>

                    {{-- image --}}
                    <div>
                        <div >
                            <a href="#" class="img-thumb" data-input="thumbnail" data-preview="holder">
                                <div id="holder">
                                    <img src="{{ asset('/images/no-image.jpg') }}" alt="" class="h-20" />
                                </div>
                            </a>
                            <input type="text" name="image" value="{{ old('image') }}" id="thumbnail"/>
                        </div>
                    </div>

                    {{-- detail --}}
                    <div>
                        <div>
                            <label for="input-meta_description">{{ __('general.meta_description') }}</label>
                            <textarea type="text" cols="3" rows="3" placeholder="{{ __('general.meta_description') }}"
                                name="meta_description" id="input-meta_description">{{ old('meta_description') }}</textarea>
                        </div>
                    </div>

                    {{-- selectboxes --}}
                    <div>
                        <div>
                            <label for="input-top">{{ __('admin/category.show_menu') }}</label>
                            <select name="top">
                                <option value="0"> {{ __('general.no') }}</option>
                                <option value="1">{{ __('general.yes') }}</option>
                            </select>
                        </div>

                        <div>
                            <label for="input-status">{{ __('general.status') }}</label>
                            <select name="status">
                                <option value="0"> {{ __('general.deactive') }} </option>
                                <option value="1">{{ __('general.active') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endcomponent
