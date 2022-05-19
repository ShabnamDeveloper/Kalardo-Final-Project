@foreach ($comments as $comment)
  <div class=" {{!$loop->first ? 'mt-3': ""}}  {{isset($answer)? $answer:"card border-0 box-shadow "}} {{$loop->last ? "mb-3" : ""}}">
    <div>
      <div class="commenter">
        <span>{{ $comment->name }}</span>
        <span class="text-muted">- {{jdate($comment->created_at)->ago()}}</span>
        @if ($comment->parent_id == 0)
          <a href="#form-box"  data-id = {{$comment->id}}>پاسخ</a>
        @endif
      </div>
    </div>
    <div class="card-body">
      <p class="mb-3">
        {{ $comment->comment }}
      </p>
    </div>
    @if(!is_null($comment->child()->where('approved',1)->get()))
      <x-comments :comments="$comment->child()->where('approved',1)->get()" :answer='"answer"'></x-comments>
    @endif
  </div>
@endforeach