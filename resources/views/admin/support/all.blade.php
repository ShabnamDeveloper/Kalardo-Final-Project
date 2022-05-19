@component('admin.layouts.content',['title'=>'درخواست پشتیبانی'])
  @slot('breadcrumb')
   <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li>
  <li class="breadcrumb-item ">درخواست پشتیبانی</li>
  @endslot
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header pb-3">
          <h3 class="card-title">درخواست پشتیبانی </h3>
          <div class="card-tools admin-search-box d-flex">
            <div class="input-group input-group-sm">
              <form action="">
                <input type="text"  value="{{request('search')}}" name="search" class="form-control float-right" placeholder="جستجو">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <tbody>
              <tr>
                <th>#</th>
                <th>{{__('app.subject')}}</th>
                <th>فروشنده</th>
                <th>تاریخ</th>
                <th>الویت</th>
                <th>وضعیت</th>
                <th>بخش مورد نظر</th>
                <th>{{__('app.action')}}</th>
              </tr>
              @foreach ($supports as $support)
                @if($support->parent_id == 0)
                  <tr>
                    <td dir="ltr">#SNTN-{{$support->id}}</td>
                    <td>{{$support->subject}}</td>
                    <td>
                      @php
                          $calss = $support->supportable_type;
                          $user = (new $calss())->find($support->supportable_id);
                      @endphp  
                      {{$user->name}}/<small>{{$user->shop_name}}</small>
                      </td>
                    
                      <td>{{jdate($support->created_at)->format('%A, %d %B %y')}}</td>

                      <td>
                        <span class="{{$support->priority == 3 ?:"d-none"}}">کم</span>
                        <span class="{{$support->priority == 2 ?:"d-none"}}">متوسط</span>
                        <span class="{{$support->priority == 1 ?:"d-none"}}">زیاد</span>
                      </td>

                      <td>
                        <span class="alert-info {{$support->status_id == 0 ?:"d-none"}}">در انتظار پاسخ</span>
                        <span class="alert-warning {{$support->status_id == 1 ?:"d-none"}}">در حال بررسی</span>
                        <span class="alert-success {{$support->status_id == 2 ?:"d-none"}}">پاسخ داده شد</span>
                      </td>

                      <td>
                          <span class="{{$support->part_id == 1 ?:"d-none"}}">بخش مالی</span>
                          <span class="{{$support->part_id == 2 ?:"d-none"}}">بخش فنی</span>
                      </td>
                    <td>

                    @can('edit-support')
                      <a href="{{route('support.edit',$support->id)}}" class="btn-primary btn ml-1 float-right">{{__('app.edit')}}</a>
                    @endcan

                    @can('delete-support')
                      <form class="float-right" method="POST" action="{{route('support.destroy',$support->id)}}">
                      @csrf
                      @method('DELETE')
                      <button class="btn-danger btn ml-1"> {{__('app.remove')}}</button>
                      </form>
                    @endcan

                    </td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div>

         <div class="card-footer">
          {{$supports->render()}}
        </div>
      </div>
    </div>
  </div>
  @endcomponent