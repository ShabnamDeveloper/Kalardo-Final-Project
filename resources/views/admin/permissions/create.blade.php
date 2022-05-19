@component('admin.layouts.content' , ['title' => 'ایجاد دسترسی'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.permissions.index') }}">همه دسترسی ها</a></li>
        <li class="breadcrumb-item active">ایجاد دسترسی</li>
    @endslot

    <div class="row">
        <div class="col-9" style=" margin-right: 269px; ">
            @include('admin.layouts.errors')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">فرم ایجاد دسترسی</h3>
                </div>

                <form class="form-horizontal" action="{{ route('admin.permissions.store') }}" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">عنوان دسترسی</label>
                            <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="عنوان دسترسی را وارد کنید" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">توضیح دسترسی</label>
                            <input type="text" name="label" class="form-control" id="inputEmail3" placeholder="توضیح دسترسی را وارد کنید" value="{{ old('label') }}">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ثبت دسترسی</button>
                        <a href="{{ route('admin.permissions.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endcomponent
