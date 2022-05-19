@component('admin.layouts.content', ['title' => 'لیست مشتری ها'])
    @slot('breadcrumb')
        {{-- <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li> --}}
        <li class="breadcrumb-item ">{{ __('admin/customer.list_customers') }}</li>
    @endslot
    <div>
        <h4>{{ __('admin/customer.list_customers') }}</h4>
    </div>

    <div>
        <div>
            <table>
                <thead>
                    <tr>
                        {{-- name --}}
                        <th>
                            <div>
                                <span>{{ __('app.name') }}</span>
                                <i></i>
                            </div>
                        </th>

                        {{-- phone number --}}
                        <th>
                            <div>
                                <span>{{ __('app.mobile_number') }}</span>
                            </div>
                        </th>

                        {{-- date --}}
                        <th>
                            <div>
                                <span>
                                    {{ __('app.registeryـdate') }} </span>
                                <i></i>
                            </div>
                        </th>

                        {{-- condition --}}
                        <th>
                            <div>
                                <span>
                                    {{ __('app.status') }} </span>
                            </div>
                        </th>

                        {{-- action --}}
                        <th>
                            <div>
                                <span>
                                </span>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        {{-- name input --}}
                        <th>
                            <div>
                                <i></i>
                                <input type="text" placeholder="پیدا کردن کالا..." value="{{ request('search') }}"
                                    name="search"/>
                            </div>
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            {{-- name --}}
                            <td>
                                <div>
                                    <span>
                                        {{ $user->name }}
                                    </span>
                                </div>
                            </td>

                            {{-- phone number --}}
                            <td>
                                <div>
                                    <span>
                                        {{ $user->phone }}
                                    </span>
                                </div>
                            </td>

                            {{-- dateّ --}}
                            <td>
                                <span>
                                    {{ $user->created_at->format('%A, %d %B %y') }}
                            </td>

                            {{-- condition --}}
                            <td>
                                <div>
                                    @if ($user->approved == 1)
                                        <span>
                                            {{ __('app.approved') }} </span>
                                    @else
                                        <span>
                                            {{ __('app.not_approved') }} </span>
                                    @endif
                                </div>
                            </td>

                            {{-- actions --}}
                            <td>
                                <button type="button">
                                    {{-- @can('edit-customer') --}}
                                    <a href="/admin/customer/{{ $user->id }}/edit">
                                        <i class="fa fa-edit"></i>
                                        <span >{{ __('app.edit') }}</span>
                                    </a>
                                    {{-- @endcan --}}
                                </button>
                                {{-- @can('delete-customer') --}}
                                <form class="" method="POST" action="{{ route('customer.destroy', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button><i data-toggle="tooltip" data-original-title="حذف"></i>
                                    </button>
                                </form>
                                {{-- @endcan --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $users->render() }}
        </div>
    </div>
@endcomponent
