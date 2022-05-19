@component('admin.layouts.content',['title'=>'درخواست پشتیبانی'])
  @slot('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li>
    <li class="breadcrumb-item "><a href="{{route('admin.support.index')}}">درخواست پشتیبانی</a></li>
    <li class="breadcrumb-item ">پاسخ درخواست</li>
    @endslot
    @slot('buttonBox')
        <a href="{{ route('admin.support.index') }}" class="btn btn-default"><i class="fa fa-reply"></i></a>
        <button type="submit" form="edit-form" class="btn btn-primary"><i class="fa fa-save"></i></button>
    @endslot
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header pb-3">
            @php
                $calss = $support->supportable_type;
                $user = (new $calss())->find($support->supportable_id);
            @endphp 
          <h3 class="card-title"> ارسال پاسخ درخواست {{$user->name}} / <small>{{$user->shop_name}}</small></h3>
        </div>
        <div class="card-body">
          <div class="form-group col-md-12">
            <div class="alert alert-secondary floar-right d-inline-block">
                {{$support->text}}
            </div>
            <div class="clear"></div>
            @foreach ($support->child as $child)
            <div class="alert d-inline-block {{$child->supportable_id == auth()->user()->id ? 'alert-info float-left' : 'alert-secondary floar-right'}}">
                {{$child->text}}
            </div>
            <div class="clear"></div>
            @endforeach
        </div>

            <form method="POST" action="{{route('admin.support.store')}}">
                @csrf
                <input type="hidden" name="supportable_id" value="{{auth()->user()->id}}">
                <input type="hidden" name="supportable_type" value="{{get_class(auth()->user())}}">
                <input type="hidden" name="parent_id" value="{{$support->id}}"> 
                <input type="hidden" name="part_id" value="{{$support->part_id}}"> 
                <div class="form-group col-md-12">
                    <label for="text">متن درخواست</label>
                    <textarea name="text" class="form-control @error('text') is-invalid @enderror" id="text" cols="30" rows="5">{{old('text')}}</textarea>
                    @error('text')
                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group col-md-12">
                    <label for="approved">وضعیت</label>
                    <select name="approved" id="approved" class="form-control @error('approved') is-invalid @enderror">
                        <option value="">{{__('app.select')}}</option>
                        <option value="0">{{__('app.deactive')}}</option>
                        <option value="1">{{__('app.active')}}</option>
                    </select>
                    @error('approved')
                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn float-left btn-success">{{__('app.send')}}</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endcomponent