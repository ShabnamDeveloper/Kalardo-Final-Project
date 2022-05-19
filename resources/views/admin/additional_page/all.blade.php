@component('admin.layouts.content', ['title' => 'لیست صفحات اضافه'])
    @slot('breadcrumb')
         <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li>
        <li>{{ __('admin/additional_page.list_additional_pages') }}</li>
    @endslot
    <div>
        <h4>{{ __('admin/additional_page.list_additional_page') }}</h4>

        {{-- add product --}}
        <div>
            {{-- @can('create-additionalPage') --}}
            <a href="{{ route('additionalPage.create') }}">
                <span>{{ __('admin/additional_page.add') }}</span>
            </a>
            {{-- @endcan --}}
        </div>

    </div>

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
                                    {{ __('app.just_name') }}</span>
                            </div>
                        </th>

                        {{-- edit --}}
                        <th>
                            <div>
                                <span>{{ __('app.action') }}</span>
                            </div>
                        </th>

                    </tr>
                    <tr>
                        <th></th>
                        <th>
                            <div>
                                <i></i>
                                <input type="text" placeholder="جست و جو" value="{{ request('search') }}" name="search"/>
                            </div>
                        </th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($additionalPages as $additionalPage)
                        <tr>
                            {{-- checkbox --}}
                            <td>
                                <div>
                                    <input type="checkbox" name="" id=""/>
                                </div>
                            </td>

                            <td>
                                <div>
                                    <span>{{ $additionalPage->name }}</span>
                                </div>
                            </td>

                            <td>
                                <button type="button">
                                    {{-- @can('edit-additionalPage') --}}
                                    <a href="{{ route('additionalPage.edit', $additionalPage->id) }}"
                                       data-toggle="tooltip"
                                        data-original-title="ویرایش">
                                        <i class="fa fa-edit"></i>
                                        <span>{{ __('app.edit') }}</span>
                                    </a>
                                    {{-- @endcan --}}
                                </button>

                                {{-- @can('delete-additionalPage') --}}
                                <form  method="POST" action="#">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                            data-toggle="tooltip" data-original-title="حذف"><i></i>
                                    </button>
                                </form>
                                {{-- @endcan --}}
                            </td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            {{ $additionalPages->render() }}
        </div>
    </div>

@endcomponent
