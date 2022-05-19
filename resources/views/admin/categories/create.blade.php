@component('admin.layouts.content' ,['title' => 'ایجاد دسته  '])
    @slot('breadcrumb')
         <li class="breadcrumb-item active"><a href="/admin">پنل مدیریت</a></li>
         <li class="breadcrumb-item active"><a href="{{ route('admin.users.index') }}">لیست دسته </a></li>
         <li class="breadcrumb-item active">ایجاد دسته </li>
    @endslot


    <div class="row">
      <div class="col-9" style=" margin-right: 269px; ">
        @include('admin.layouts.errors')
            <div class="card ">
                <div class="card-header">
                  <h3 class="card-title">فرم ایجاد دسته </h3>
                </div>

                <!-- form start -->
                <form class="form-horizontal" action="{{ route ('admin.categories.store') }}" method="POST">
                    @csrf

                  <div class="card-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">نام دسته </label>
                        <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="نام دسته  را وارد کنید">
                    </div>
                    @if(request('parent'))
                      @php
                        $parent = \App\Models\Category::find(request('parent'))
                      @endphp

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"> دسته مرتبط</label>
                        <input type="text" class="form-control" id="inputEmail3" disabled value="{{ $parent->name }}">
                        <input type="hidden" name="parent" value="{{ $parent->id }}">
                      </div>
                      
                    @endif
                  </div>

                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">ثبت دسته </button>
                    <a href="{{ route('admin.categories.index')}}" class="btn btn-default float-left">لغو</a>
                  </div>

                </form>
              </div>
        </div>
    </div>
@endcomponent