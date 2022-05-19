<div id="form-box">
  <h3>{{__('app.comment')}}</h3>
  <form action="{{route('send.comment')}}" method="POST" >
    @csrf 
    <input type="hidden" name="commentable_id" value="{{$product->id}}">
    <input type="hidden" name="commentable_type" value="{{get_class($product)}}">
    <input type="hidden" name="parent_id" value="0">
    <div>
      <div class="form-group">
        <label for="input-name" >{{__('app.name')}}</label>
        <div class="col-12">
        <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" id="input-name" placeholder="{{__('app.name')}}">
          @error('name')
            <span class="invalid-feedback" role="alert">
              {{$message}}
            </span>
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="input-email">{{__('app.email')}}</label>
        <div class="col-12">
          <input type="text" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" id="input-email" placeholder="{{__('app.email')}}">
          @error('email')
            <span class="invalid-feedback" role="alert">
              {{$message}}
            </span>
          @enderror
        </div>
      </div>
    </div>
    <div>
      <div class="form-group">
        <label for="input-comment" class="col-12 control-label">{{__('app.comment')}}</label>
        <div class="col-12">
            <textarea name="comment" cols="30" rows="10" class="form-control @error('comment') is-invalid @enderror" id="input-comment">{{old('comment')}}</textarea>
            @error('comment')
            <span class="invalid-feedback" role="alert">
              {{$message}}
            </span>
          @enderror
        </div>
      </div>
    </div>
    <div class="form-group">
      <input type="submit" value="{{__('app.send')}}" class="btn btn-success">
    </div>
  </form>
</div> 