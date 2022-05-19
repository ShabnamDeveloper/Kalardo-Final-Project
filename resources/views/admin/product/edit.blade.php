@component('admin.layouts.content')
    @slot('script')
        <script>
            changeAttributeValues = (event, id) => {
                let valueBox = $(`select[name='attributes[${id}][value]']`);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    }
                })
                $.ajax({
                    type: 'POST',
                    url: '/admin/attribute/values',
                    data: JSON.stringify({
                        name: event.target.value
                    }),
                    success: function(data) {
                        valueBox.html(`
                                <option selected>انتخاب کنید</option>
                                ${
                                data.map(function (item) {
                                    return `<option value="${item}">${item}</option>`
                                })
                            }
                            `);
                        document.querySelector('.attribute-select').select2({
                            tags: true
                        });
                    }
                });
            }
            createNewAttr = ({
                attributes,
                id
            }) => {
                return `
                <div class="row" id="attribute-${id}">
                    <div class="col-5">
                        <div class="form-group">
                            <label>عنوان ویژگی</label>
                            <select name="attributes[${id}][name]" onchange="changeAttributeValues(event, ${id});" class="attribute-select form-control">
                            <option value="">انتخاب کنید</option>
                                ${
                                    attributes.map(function(item) {
                                        return `<option value="${item}">${item}</option>`
                                    })
                                }
                            </select>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label>مقدار ویژگی</label>
                            <select name="attributes[${id}][value]" class="attribute-select form-control">
                                <option value="">انتخاب کنید</option>
                            </select>
                        </div>
                    </div>
                        <div class="col-2">
                        <label >{{ __('app.action') }}</label>
                        <div>
                            <button type="button" class="btn btn-sm btn-warning" onclick="document.getElementById('attribute-${id}').remove()">{{ __('app.remove') }}</button>
                        </div>
                    </div>
                </div>
            `
            }
            document.querySelector('#add_product_attribute').click(function() {
                let attributesSection = document.querySelector('#attribute_section');
                let id = attributesSection.children().length;
                let attributes = document.querySelector('#attributes').data('attributes');
                attributesSection.insertAdjacentHTML("beforeend",
                    createNewAttr({
                        attributes: attributes,
                        id
                    })
                );
                document.querySelector('.attribute-select').select2({
                    tags: true
                });
            });

        </script>
    @endslot
    <div>
        <div>
            <div id="attributes" data-attributes="{{ json_encode(\App\Models\Attribute::all()->pluck('name')) }}"></div>
            <form action="{{ route('product.update', $product->id) }}" id="edit-form" method="POST" class="">
                @csrf
                @method('PATCH')
                {{-- header title --}}
                <div>
                    <h4>{{ __('admin/product.edit') }}</h4>
                    <div>
                        <a href="{{ route('product.index') }}">
                            <i></i>
                            <span class=""> {{ __('general.back') }} </span>
                        </a>
                        <button type="submit">
                            {{ __('general.save') }} </button>
                    </div>
                </div>

                {{-- content --}}
                <div>
                    {{-- name and model --}}
                    <div>
                        <div>
                            <label>{{ __('admin/product.name') }}</label>
                            <input type="text" name="name" value="{{ $product->name }}" placeholder="{{ __('admin/product.name') }}">
                            @error('persian_name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div>
                            <label>{{ __('admin/product.model') }}</label>
                            <input type="text" name="model" value="{{ $product->model }}" placeholder="{{ __('admin/product.model') }}">
                            @error('model')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    {{-- link and price --}}
                    <div>
                        <div class="w-1/2">
                            <label>{{ __('general.slug') }}</label>
                            <input type="text" name="slug" value="{{ $product->slug }}" placeholder="{{ __('general.slug') }}">
                            @error('slug')
                                {{ $message }}
                            @enderror
                        </div>
                        <div>
                            <label for="input-price">{{ __('general.price') }}
                            </label>
                            <input type="text" name="price" value="{{ $product->price }}" id="input-price" placeholder="{{ __('general.price') }}">
                            @error('price')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    {{-- short description --}}
                    <div>
                        <div>
                            <label for="input-short_description">
                                {{ __('admin/product.short_description') }} </label>
                            <textarea type="text" name="short_description"
                                id="input-short_description"
                                      placeholder="{{ __('admin/product.short_description') }}">{{ old('short_description') }}</textarea>
                            @error('short_description')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    {{-- description --}}
                    <div>
                        <div>
                            <label for="input-description">
                                {{ __('general.description') }} </label>
                            <textarea type="text" name="description"
                                id="input-description" cols="30" rows="10" placeholder="{{ __('general.description') }}">{{ $product->description }}</textarea>
                            @error('short_description')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    {{-- category and status --}}
                    <div>
                        <div>
                            <label for="categories">{{ __('admin/product.category') }}
                            </label>
                            <select name="categories[]" id="categories"
                                multiple>
                                @foreach (\App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('categories')
                                {{ $message }}
                            @enderror
                        </div>
                        <div>
                            <label for="status">{{ __('general.status') }}
                            </label>
                            <select name="status_id" id="status">
                                @foreach (\App\Models\Status::all() as $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                            @error('status_id')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    {{-- inventory and meta title --}}
                    <div>
                        <div >
                            <label for="input-inventory">{{ __('general.inventory') }}</label>
                            <input type="text" name="inventory" value="{{ $product->inventory }}" id="input-inventory"
                                placeholder="{{ __('general.inventory') }}">
                            @error('inventory')
                                {{ $message }}
                            @enderror
                        </div>
                        <div>
                            <label for="input-meta_title">{{ __('general.meta_title') }}</label>
                            <input type="text" name="meta_title" placeholder="{{ __('general.meta_title') }}"
                                value="{{ $product->meta_title }}"
                                id="input-meta_title">
                            @error('meta_title')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    {{-- attributes --}}
                    <div id="attribute-pannel">
                        <label for="input-attr" >{{ __('admin/product.attribute') }}
                        </label>
                        <hr>
                        <div id="attribute_section">

                        </div>
                        <button class="btn btn-sm btn-success" type="button"
                            id="add_product_attribute">{{ __('admin/product.add_attribute') }}</button>
                    </div>

                    {{-- image --}}
                    <div>
                        <div>
                            <a href="#" class="img-thumb" data-input="thumbnail" data-preview="holder">
                                <div id="holder">
                                    <img src="{{ asset('/images/no-image.jpg') }}" alt="" />
                                </div>
                            </a>
                            <input type="text" name="image" value="{{ $product->image }}" id="thumbnail">
                        </div>
                    </div>

                    {{-- meta description --}}
                    <div>
                        <div>
                            <label for="input-meta_description">{{ __('general.meta_description') }}</label>
                            <textarea type="text" cols="3" rows="3" placeholder="{{ __('general.meta_description') }}"
                                name="meta_description"
                                id="input-meta_description">{{ $product->meta_description }}</textarea>
                            @error('meta_description')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                     <div class="relative">
                        <label for="input-status" >{{ __('general.status') }}</label>
                        <div class="col-6">
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
