@component('admin.layouts.content',['title' => 'لیست دسته بندی ها'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">لیست دسته بندی ها</li>
    @endslot

    <div class="row">
        <div class="col-9" style=" margin-right: 269px; ">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">دسته بندی ها</h3>
              <div class="card-tools">

                <div class="btn-group-sm mr-1">
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-info">ایجاد دسته جدید</a>
                </div>

                <div class="card-body">
                  {{ $categories->appends(['search' => request('search')])->render() }}
                </div>
              </div>
            </div>

            <div class="card-body table-responsive p-0">
              @include('admin.layouts.categories-group' , ['categories'=>$categories]) 
            </div>
           
            <div class="card-footer">
              {{ $categories->appends(['search' => request('search')])->render() }}
            </div>
            
          </div>
        </div>
      </div>
@endcomponent