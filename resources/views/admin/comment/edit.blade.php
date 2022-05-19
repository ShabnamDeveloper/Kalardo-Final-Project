@component('admin.layouts.content', ['title' => 'ویرایش نظر'])

    @slot('breadcrumb')
        {{-- <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li> --}}
        <li class="breadcrumb-item "><a href="{{ route('comment.index') }}">{{ __('admin/comment.list_comments') }}</a></li>
        <li class="breadcrumb-item active">{{ __('admin/comment.edit_comment') }}</li>
    @endslot
    <div>
        <div>
            {{-- header title --}}
            <div>
                <h4>{{ __('admin/comment.form_edit_comment') }}</h4>
                <div>
                    <a href="{{ route('comment.index') }}">
                        <i></i>
                        <span class=""> {{ __('app.cancel') }} </span>
                    </a>
                    <button type="submit">
                        {{ __('app.update') }} </button>
                </div>
            </div>

             <div>
                <h3>{{ __('admin/comment.form_edit_comment') }} </h3>
            </div>

            {{-- edit form starts --}}
            <form action="{{ route('comment.update', $comment->id) }}" method="POST" class="">
                @csrf
                @method('PATCH')
                <div>
                    <div>
                        <div>
                            <label for="input-comment">
                                {{ __('admin/comment.comment') }}
                            </label>
                            <textarea name="comment"
                                id="input-comment">{{ $comment->comment }}</textarea>
                            @error('comment')
                                <span role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                 <div class="card-footer">
                    <a href="{{ route('comment.index') }}" type="submit" class="btn btn-default">{{ __('app.cancel') }}</a>
                    <button type="submit" class="btn btn-info float-left">{{ __('app.update') }}</button>
                 </div>
            </form>
        </div>
    </div>
@endcomponent
