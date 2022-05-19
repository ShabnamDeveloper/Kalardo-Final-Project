@component('admin.layouts.content')
    <div class="w-full mt-4">
        {{-- buttons --}}
        <div>
            <div>
                {{-- add group --}}
                <a href="#">
                    <div>
                        <span>افزودن گروهی</span>
                    </div>
                </a>

                {{-- output --}}
                <a href="#">
                    <div>
                        <span>گرفتن خروجی</span>
                    </div>
                </a>

                {{-- delete --}}
                <a href="#">
                    <div>
                        <span>حذف</span>
                    </div>
                </a>

            </div>
            {{-- add product --}}
            <button>
                <a href="{{ route('category.create') }}">
                    <span>{{ __('admin/category.add') }}</span>
                </a>
            </button>
        </div>

        {{-- table starts --}}
        <div>
            <div>
                <table>
                    <thead>
                        <tr>
                            {{-- checkbox --}}
                            <th>
                                <div>
                                    <input type="checkbox" name="" id=""/>
                                </div>
                            </th>

                            {{-- name --}}
                            <th>
                                <div>
                                    <span>
                                        {{ __('general.name') }} </span>
                                    <i></i>
                                </div>
                            </th>

                            {{-- edit --}}
                            <th scope="col">
                                <div>
                                    <span>
                                    </span>
                                </div>
                            </th>
                        </tr>

                        <tr>
                            <th></th>
                            {{-- input --}}
                            <th>
                                <div>
                                    <i></i>
                                    <input type="text" placeholder="پیدا کردن کالا..."/>
                                </div>
                            </th>

                            {{-- category --}}
                            <th>
                                <div>
                                    <select name="" id="">
                                        <option value="">فیلتر</option>
                                        <option value="1">بررسی</option>
                                        <option value="2">فعال</option>
                                        <option value="3">غیر فعال</option>
                                    </select>
                                </div>
                            </th>

                        </tr>
                    </thead>

                    <tbody class="">
                        @foreach ($categories as $category)
                            <tr>
                                {{-- checkbox --}}
                                <td>
                                    <div>
                                        <input type="checkbox" name="" id=""/>
                                    </div>
                                </td>

                                {{-- name --}}
                                <td>
                                    <div>
                                        <span>
                                            {{ $category->name }}
                                        </span>
                                    </div>
                                </td>

                                {{-- edit --}}
                                <td>
                                    <button>
                                        <a href="{{ route('category.edit', $category->id) }}">
                                            <i></i>
                                            <span>{{ __('general.edit') }}</span>
                                        </a>
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div>
        <div>
            نمایش
            <span class=""> 1 </span>
            تا
            <span class=""> 10 </span>
            از
            <span class=""> 16 </span>
            محصول
        </div>

        <div>
            {{ $categories->render() }}
        </div>

        <div class="">
            <ul>
                <li>
                    <i></i>
                </li>

                <li>
                    <a href="#">1</a>
                </li>

                <li>
                    <a href="#">2</a>
                </li>

                <li>
                    <i></i>
                </li>
            </ul>
        </div>
    </div>
@endcomponent
