@component('admin.layouts.content')
    <div>
        <div>
            {{-- header title --}}
            <div>
                <h4>
                    {{ __('admin/category.edit') }}
                </h4>
                <div>
                    <a href="{{ route('category.index') }}">
                        <i></i>
                        <span class=""> {{ __('general.back') }} </span>
                    </a>
                    <button type="submit">
                        {{ __('general.save') }} </button>
                </div>
            </div>

            {{-- form starts --}}
            <form action="{{ route('category.update', $category->id) }}" id="edit-form" method="POST" class="">
                @csrf
                @method('PATCH')
                <div>
                    {{-- name and link --}}
                    <div>
                        <div>
                            <label>{{ __('general.name') }}</label>
                            <input type="text" name="name" value="{{ $category->name }}" placeholder="{{ __('general.name') }}">

                        </div>
                        <div>
                            <label>{{ __('general.slug') }}</label>
                            <input type="text" name="slug" value="{{ $category->slug }}" placeholder="{{ __('general.slug') }}">
                        </div>
                    </div>

                    {{-- details --}}
                    <div>
                        <div>
                            <label for="input-description">{{ __('general.description') }}</label>
                                <textarea type="text" cols="30" rows="10" placeholder="{{ __('general.description') }}"
                                    name="description" id="input-description">{{ $category->description }}</textarea>
                        </div>
                    </div>

                    {{-- select and title --}}
                    <div>
                        <div>
                            <label for="input-parent">{{ __('admin/category.parent') }}</label>
                            <select name="parent_id" id="parent">
                                <option value="0">{{ __('admin/category.parent') }}</option>
                                @foreach (\App\Models\Category::all() as $cat)
                                    <option value="{{ $cat->id }}"
                                        {{ $cat->id == $category->parent_id ? 'selected' : '' }}>{{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="input-meta_title">{{ __('general.meta_title') }}</label>
                            <input type="text" name="meta_title" placeholder="{{ __('general.meta_title') }}"
                                value="{{ $category->meta_title }}"
                                id="input-meta_title">
                        </div>
                    </div>

                    {{-- image --}}
                    <div>
                        <div>
                            <span >
                                <a class="img-thumb" data-input="thumbnail" data-preview="holder">
                                    <div id="holder">
                                        <img src="{{ asset('/images/no-image.jpg') }}" alt="">
                                    </div>
                                </a>
                            </span>
                            <input dir="ltr" id="thumbnail" value="{{ $category->image }}"
                                type="text" name="image">
                        </div>
                    </div>

                    {{-- detaails --}}
                    <div>
                        <div >
                            <label for="input-meta_description">{{ __('general.meta_description') }}</label>
                            <textarea type="text" cols="3" rows="3" placeholder="{{ __('general.meta_description') }}"
                                name="meta_description"
                                id="input-meta_description">{{ $category->meta_description }}</textarea>
                        </div>
                    </div>

                    {{-- selectboxes --}}
                    <div>
                        <div>
                            <label for="input-top">{{ __('admin/category.show_menu') }}</label>
                            <select name="top">
                                <option value="0" {{ $category->top == 0 ? 'selected' : '' }}> {{ __('general.no') }}
                                </option>
                                <option value="1" {{ $category->top == 1 ? 'selected' : '' }}>{{ __('general.yes') }}
                                </option>
                            </select>
                        </div>
                        <div>
                            <label for="input-status">{{ __('general.status') }}</label>
                            <select name="status">
                                <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>
                                    {{ __('general.deactive') }}
                                </option>
                                <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>
                                    {{ __('general.active') }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endcomponent
