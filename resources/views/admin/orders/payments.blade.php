@component('admin.layouts.content' , ['title' => 'لیست پرداخت‌ها'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">سفارش شماره {{ $order->id }} </li>
        <li class="breadcrumb-item active">لیست پرداخت‌ها</li>
    @endslot

    <div class="row">
        <div class="col-9" style=" margin-right: 269px; ">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">لیست پرداخت‌ها</h3>

                    <div class="card-tools d-flex">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو" value="{{ request('search') }}">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>آیدی پرداخت</th>
                                <th>شماره پرداخت</th>
                                <th>وضعیت پرداخت</th>
                                <th>زمان ثبت پرداخت</th>
                            </tr>

                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{ $payment->id }}</td>
                                    <td>{{ $payment->resnumber }}</td>
                                    <td>{{ $payment->status ? 'پرداخت شده' : 'پرداخت نشده'}}</td>
                                    <td>{{ ($payment->created_at)->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    {{ $payments->appends([ 'search' => request('search') ])->render() }}
                </div>
            </div>
        </div>
    </div>

@endcomponent
