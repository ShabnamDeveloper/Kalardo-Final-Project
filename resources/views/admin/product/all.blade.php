@component('admin.layouts.content')
    <div class="w-full mt-4">
        <div>
            <div>
                <a href="#">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        <span>افزودن گروهی</span>
                    </div>
                </a>

                <a href="#">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        </svg>
                        <span>گرفتن خروجی</span>
                    </div>
                </a>

                <a href="#">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span>حذف</span>
                    </div>
                </a>
            </div>

            <button>
                <a href="{{route('product.create')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 text-sm" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>{{ __('admin/product.add') }}</span>
                </a>
            </button>
        </div>

        <div>
            <div>
                <table>
                    <thead class="">
                        <tr>
                            {{-- checkbox --}}
                            <th>
                                <div>
                                    <input type="checkbox" name="" id=""/>
                                </div>
                            </th>

                            {{-- picture --}}
                            <th>
                                <div>
                                    <span>
                                        {{ __('general.image') }}
                                    </span>
                                </div>
                            </th>

                            {{-- name --}}
                            <th>
                                <div>
                                    <span>{{ __('general.name') }}</span>
                                    <i></i>
                                </div>
                            </th>

                            {{-- product code --}}
                            <th>
                                <div>
                                    <span>کد کالا</span>
                                    <i></i>
                                </div>
                            </th>

                            {{-- price --}}
                            <th>
                                <div>
                                    <span>{{ __('general.price') }}</span>
                                    <i></i>
                                </div>
                            </th>

                            {{-- Inventory --}}
                            <th>
                                <div>
                                    <span>موجودی</span>
                                </div>
                            </th>

                            {{-- category --}}
                            <th>
                                <div>
                                    <span>{{ __('general.category') }}</span>
                                </div>
                            </th>

                            {{-- edit --}}
                            <th>
                                <div>
                                    <span>
                                    </span>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            {{-- product name input --}}
                            <th>
                                <div>
                                    <i></i>
                                    <input type="text" placeholder="پیدا کردن کالا..."/>
                                </div>
                            </th>

                            {{-- product code input --}}
                            <th>
                                <div>
                                    <i></i>
                                    <input type="text" placeholder="پیدا کردن کالا..."/>
                                </div>
                            </th>
                            <th></th>
                            <th></th>

                            {{-- category select --}}
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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="">
                            @foreach ($products as $product)
                                <tr>
                                    {{-- checkbox --}}
                                    <td>
                                        <div >
                                            <input type="checkbox" name="" id=""/>
                                        </div>
                                    </td>
                                    {{-- picture --}}
                                    <td>
                                        <div>
                                             <img src="{{ $product->image }}" alt="product picture" >
                                            <img src="https://b2n.ir/y13568" alt="product picture" class="w-16">
                                        </div>
                                    </td>

                                    {{-- product name --}}
                                    <td>
                                        <div>
                                            <span>
                                                {{ $product->name }}
                                            </span>
                                        </div>
                                    </td>

                                    {{-- product code --}}
                                    <td>
                                        <div>
                                            <span>
                                              کد
                                            </span>
                                        </div>
                                    </td>

                                    {{-- price --}}
                                    <td>
                                        <div>
                                            <div>
                                                <span class="">7000000</span>
                                                <span class="">تومان</span>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- inventory --}}
                                    <td>
                                        <div>
                                            <span>
                                                تعداد
                                            </span>
                                        </div>
                                    </td>

                                    {{-- category --}}
                                    <td>
                                        <div>
                                            <span>موجودی</span>
                                        </div>
                                    </td>

                                    {{-- edit --}}
                                    <td>
                                        <button>
                                            <a href="{{ route('product.edit', $product->id) }}">
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

        <div class="card-footer">{{ $products->render() }}</div>

        <div>
            <ul>
                <li>
                    <i></i>
                </li>
                <li>
                    <a href="#">1</a>
                </li>
                <li>
                    <a href="#" >2</a>
                </li>
                <li>
                    <i></i>
                </li>
            </ul>
        </div>
    </div>
@endcomponent
