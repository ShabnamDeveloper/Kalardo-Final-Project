@component('admin.layouts.content' ,['title' => 'ویرایش دسته  '])
    @slot('breadcrumb')
         <li class="breadcrumb-item active"><a href="/admin">پنل مدیریت</a></li>
         <li class="breadcrumb-item active"><a href="{{ route('admin.users.index') }}">لیست دسته </a></li>
         <li class="breadcrumb-item active">ویرایش دسته </li>
    @endslot


    <div class="row">
      <div class="col-9" style=" margin-right: 269px; ">
        @include('admin.layouts.errors')
            <div class="card ">
                <div class="card-header">
                  <h3 class="card-title">فرم ویرایش دسته </h3>
                </div>

                <form class="form-horizontal" action="{{ route ('admin.categories.update' , $category->id ) }}" method="POST">
                    @csrf
                    @method('patch')

                  <div class="card-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">نام دسته </label>
                        <input value="{{ old('name' , $category->name) }}" type="text" name="name" class="form-control" id="inputEmail3">
                    </div>
                  </div>

                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">ویرایش دسته </button>
                    <a href="{{ route('admin.categories.index')}}" class="btn btn-default float-left">لغو</a>
                  </div>
                </form>
              </div>
        </div>
    </div>
@endcomponent