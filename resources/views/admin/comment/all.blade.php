@component('admin.layouts.content', ['title' => 'لیست نظرات'])
    @slot('breadcrumb')
        {{-- <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li> --}}
        <li class="breadcrumb-item ">{{ __('admin/comment.list_comments') }}</li>
    @endslot
    <div>
        {{-- title --}}
        <h4>{{ __('admin/comment.list_comments') }}</h4>
    </div>

    <div>
        <div>
            <table>
                <thead>
                    <tr>
                        {{-- name --}}
                        <th>
                            <div>
                                <span>{{ __('app.just_name') }}</span>
                            </div>
                        </th>

                        {{-- brand name --}}
                        <th>
                            <div>
                                <span>
                                    نام محصول </span>
                            </div>
                        </th>

                        {{-- status --}}
                        <th>
                            <div>
                                <span>{{ __('app.status') }}</span>
                            </div>
                        </th>
                    </tr>

                    <tr>
                        {{-- name input --}}
                        <th>
                            <div>
                                <i></i>
                                <input type="text" placeholder="جست و جو" value="{{ request('search') }}" name="search"/>
                            </div>
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            {{-- name --}}
                            <td>
                                <div >
                                    <span>
                                        {{ $comment->name }}
                                    </span>
                                </div>
                            </td>

                            {{-- brand name --}}
                            <td >
                                <div>
                                    <span>سامسونگ</span>
                                </div>
                            </td>

                            {{-- category --}}
                            <td>
                                <div>
                                    @if ($comment->approved == 1)
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
                                    {{-- @can('edit-comment') --}}
                                    <a href="{{ route('comment.edit', $comment->id) }}">
                                        <i class="fa fa-edit"></i>
                                        <span>{{ __('app.edit') }}</span>
                                    </a>
                                    {{-- @endcan --}}
                                </button>
                                {{-- @can('delete-comment') --}}
                                <form class="" method="POST" action="{{ route('comment.destroy', $comment->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button>
                                        <i></i>
                                    </button>
                                </form>
                                {{-- @endcan --}}
                                {{-- @can('edit-comment') --}}
                                <form class="" method="POST"
                                    action="{{ route('comment.approved', $comment->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button>
                                        <i></i>
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
            {{ $comments->render() }}
        </div>
    </div>
@endcomponent
