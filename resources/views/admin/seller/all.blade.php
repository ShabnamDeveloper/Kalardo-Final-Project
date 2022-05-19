@component('admin.layouts.content')
    <div>
        {{-- top buttons --}}
        <div>
            {{-- group buttons --}}
            <div>
                {{-- add as group --}}
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

            {{-- add seller --}}
            <button>
                <a href="#">
                    <span>افزودن فروشنده</span>
                </a>
            </button>
        </div>
        {{-- table --}}
        <div>
            <div>
                <table>
                    {{-- thead --}}
                    <thead>
                        {{-- title tr --}}
                        <tr>
                            {{-- checkbox --}}
                            <th>
                                <div>
                                    <input type="checkbox" name="" id=""/>
                                </div>
                            </th>
                            {{-- company name --}}
                            <th>
                                <div>
                                    <span>
                                        نام فروشگاه</span>
                                        <i></i>
                                </div>
                            </th>

                            {{-- agent --}}
                            <th scope="col">
                                <div>
                                    <span>نماینده</span>
                                        <i></i>
                                </div>
                            </th>

                            {{-- sales --}}
                            <th>
                                <div>
                                    <span>فروش</span>
                                        <i></i>
                                </div>
                            </th>

                            {{-- condition --}}
                            <th>
                                <div>
                                    <span>وضعیت</span>
                                </div>
                            </th>

                            {{-- seller code --}}
                            <th>
                                <div>
                                    <span> فروشنده</span>
                                </div>
                            </th>

                            {{-- action --}}
                            <th>
                                <div>
                                    <span></span>
                                </div>
                            </th>
                        </tr>

                        {{-- subtitle tr --}}
                        <tr>
                            {{-- checkbox --}}
                            <th></th>
                            {{-- name input --}}
                            <th>
                                <div>
                                    <input type="text" placeholder="پیدا کردن مشتری"/>
                                        <i></i>
                                </div>
                            </th>
                            {{-- agent --}}
                            <th>
                            </th>
                            {{-- sales --}}
                            <th></th>
                            {{-- condition --}}
                            <th>
                                <div class="mx-2">
                                    <select name="" id="">
                                        <option value="">فیلتر</option>
                                        <option value="1">بررسی</option>
                                        <option value="2">فعال</option>
                                        <option value="3">غیر فعال</option>
                                    </select>
                                </div>
                            </th>
                            {{-- seller code --}}
                            <th>
                                <div>
                                    <i></i>
                                    <input type="text" placeholder="شماره همراه"/>
                                </div>
                            </th>
                            {{-- action --}}
                            <th></th>
                        </tr>
                    </thead>
                    {{-- thead --}}
                    <tbody class="">
                        @foreach ($users as $user)
                            <tr>
                                {{-- checkbox --}}
                                <td>
                                    <div>
                                        <input type="checkbox" name="" id=""/>
                                    </div>
                                </td>
                                {{-- company name --}}
                                <td>
                                    <div>
                                        <div>
                                            <img src="https://b2n.ir/e74328" alt="logo"/>
                                        </div>
                                        <div>
                                            <p>
                                                {{ $user->name }}</p>
                                            <p>65325</p>
                                        </div>
                                    </div>
                                </td>

                                {{-- agent --}}
                                <td>
                                    <div>
                                        <span>
                                            اقای رستمی
                                        </span>
                                    </div>
                                </td>

                                {{-- sales --}}
                                <td>
                                    <div>
                                        <span>7000000</span>
                                        <span>تومان</span>
                                    </div>
                                </td>

                                {{-- condition --}}
                                <td>
                                    <div>
                                        <span>{{ $user->status }}</span>
                                    </div>
                                </td>

                                {{-- seller code --}}
                                <td>
                                    <div>
                                        <span>
                                            FC-585-659854
                                        </span>
                                    </div>
                                </td>

                                {{-- action --}}
                                <td>
                                    <div>
                                        <button>
                                            <a href="/admin/seller/{{ $user->id }}/edit">
                                                <i></i>
                                                <span>
                                                    ویرایش
                                                </span>
                                            </a>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endcomponent
