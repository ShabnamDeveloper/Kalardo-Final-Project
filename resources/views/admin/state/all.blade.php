@push('child-style')

@endpush
@push('script-library')

@endpush

@push('title')
    <div>استان ها</div>
@endpush

@component('admin.layouts.content')
    <div>
        <div>
            <div>
                <h3>لیست استان ها</h3>
            </div>
            <div>
                <a href="{{ route('state.create') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 text-sm" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>افزودن استان</span>
                </a>
            </div>
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
                            {{-- city name --}}
                            <th>
                                <div>
                                    <span>نام استان</span>
                                    <i></i>
                                </div>
                            </th>
                            {{-- edit --}}
                            <th></th>
                        </tr>

                        <tr>
                            <th></th>
                            {{-- input --}}
                            <td>
                                <div>
                                    <form action="" class="">
                                        <input value="{{ request('search') }}" name="search" type="text"
                                            placeholder="پیدا کردن استان"/>
                                        <i></i>
                                    </form>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($states as $state)
                            <tr>
                                <td>
                                    <div>
                                        <input type="checkbox" />
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <span>
                                            {{ $state->name }}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <button type="button">
                                        <a href="{{ route('state.edit', $state->id) }}" data-toggle="tooltip" data-original-title="ویرایش">
                                            <i></i>
                                            <span class="text-sm">ویرایش</span>
                                        </a>
                                    </button>

                                    <form class="float-right my-auto" method="POST" action="{{ route('state.destroy', $state->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            data-toggle="tooltip" data-original-title="حذف"><i></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <div>
                {{ $states->render() }}
            </div>
        </div>
    </div>
@endcomponent
