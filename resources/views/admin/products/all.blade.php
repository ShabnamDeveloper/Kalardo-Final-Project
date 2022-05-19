@component('admin.layouts.content',['title' => 'لیست محصول'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">لیست محصول</li>
    @endslot
    <div class="row">
      <div class="col-9" style=" margin-right: 269px; ">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">محصول</h3>

              <div class="card-tools d-flex">
                <form action="">
                  <div class="input-group input-group-sm" style="width: 150px;">

                    <input type="text" name="search" class="form-control float-right" placeholder="جستجو">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>

                <div class="btn-group-sm mr-1">
                   @canany(['create-product' , 'seller'])
                      <a href="{{ route('admin.products.create') }}" class="btn btn-info">ایجاد محصول جدید</a>
                   @endcanany
                </div>
              </div>
            </div>

            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>ایدی محصول</th>
                        <th>نام محصول</th>
                        <th> موجودی </th>
                        <th> بازدید </th>
                        <th>اقدامات</th>
                    </tr>

                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->title}}</td>
                            <td>{{$product->inventory}}</td>
                            <td>{{$product->view_count}}</td>

                            <td class="d-flex">
                                 @can('delete-product')
                                    <form action="{{route('admin.products.destroy' , $product->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger ml-1">حذف</button>
                                    </form>
                                 @endcan

                                 @canany(['edit-product' , 'seller'])
                                         <a href="{{route('admin.products.edit', $product->id )}}" class="btn btn-sm btn-primary">ویرایش</a>
                                 @endcanany
                                 <a href="{{ route('admin.products.gallery.index' , ['product' => $product->id ]) }}" class="btn btn-sm btn-warning mr-2">گالری تصاویر</a>
                            </td>
                        </tr>
                    @endforeach
              </tbody>
            </table>
            </div>
            <div class="card-footer">
              {{ $products->appends(['search' => request('search')])->render() }}
            </div>
          </div>
        </div>
      </div>
@endcomponent
