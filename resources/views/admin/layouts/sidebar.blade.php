<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('admin.') }}">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>پنل مدیریت</p>
                        </a>
                    </li>

                    @can('seller')
                        <li class="nav-item">
                            <a  href="{{ action('App\Http\Controllers\Admin\ProductController@index') }}" class="nav-link {{ ('admin.products.all') }}">
                                <i class="nav-icon fa fa-shopping-cart"></i>
                                <p> مدیریت محصولات</p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview {{ isActive(['admin.orders.index',] , 'menu-open') }}">
                            <a href="#" class="nav-link {{ isActive(['admin.orders.index']) }}">
                                <i class="nav-icon fa fa-money"></i>
                                <p>
                                    بخش سفارشات
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.orders.index' , ['type' => 'unpaid']) }}" class="nav-link {{ isUrl(route('admin.orders.index' , ['type' => 'unpaid'])) }} ">
                                        <i class="fa fa-circle-o nav-icon text-warning"></i>
                                        <p>پرداخت نشده
                                            <span class="badge badge-warning right">{{ \App\Models\Order::whereStatus('unpaid')->count() }}</span>
                                        </p>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.orders.index' , ['type' => 'paid']) }}" class="nav-link {{ isUrl(route('admin.orders.index' , ['type' => 'paid'])) }}">
                                        <i class="fa fa-circle-o nav-icon text-info"></i>
                                        <p>پرداخت شده
                                            <span class="badge badge-info right">{{ \App\Models\Order::whereStatus('paid')->count() }}</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.orders.index'  , ['type' => 'preparation']) }}" class="nav-link {{ isUrl(route('admin.orders.index' , ['type' => 'preparation'])) }}">
                                        <i class="fa fa-circle-o nav-icon text-primary"></i>
                                        <p>در حال پردازش
                                            <span class="badge badge-primary right">{{ \App\Models\Order::whereStatus('preparation')->count() }}</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.orders.index' , ['type' => 'posted']) }}" class="nav-link {{ isUrl(route('admin.orders.index' , ['type' => 'posted'])) }}">
                                        <i class="fa fa-circle-o nav-icon text text-light"></i>
                                        <p>ارسال شده
                                            <span class="badge badge-light right">{{ \App\Models\Order::whereStatus('posted')->count() }}</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.orders.index' , ['type' => 'received']) }}" class="nav-link {{ isUrl(route('admin.orders.index' , ['type' => 'received'])) }}">
                                        <i class="fa fa-circle-o nav-icon text-success"></i>
                                        <p>دریافت شده
                                            <span class="badge badge-success right">{{ \App\Models\Order::whereStatus('received')->count() }}</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.orders.index' , ['type' => 'canceled']) }}" class="nav-link {{ isUrl(route('admin.orders.index' , ['type' => 'canceled'])) }}">
                                        <i class="fa fa-circle-o nav-icon text-danger"></i>
                                        <p>کنسل شده
                                            <span class="badge badge-danger right">{{ \App\Models\Order::whereStatus('canceled')->count() }}</span>
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan

                    @can('show-users')
                        <li class="nav-item has-treeview {{ isActive(['admin.users.index' , 'admin.users.create' , 'admin.users.edit'] , 'menu-open') }}">
                            <a href="#" class="nav-link {{ isActive('admin.users.index') }}">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    کاربران
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ isActive('admin.users.index') }}">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>لیست کاربران</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a  href="{{ action('App\Http\Controllers\Admin\categoryController@index') }}" class="nav-link {{ ('admin.categories.all') }}">
                                <i class="nav-icon fa fa-list"></i>
                                <p> مدیریت دسته بندی</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a  href="{{ action('App\Http\Controllers\Admin\CommentController@index') }}" class="nav-link {{ ('admin.comments.all') }}">
                                <i class="nav-icon fa fa-comment"></i>
                                <p> مدیریت نظرات</p>
                            </a>
                        </li>
                    @endcan

                    @canany(['show-permissions' , 'show-roles'])
                        <li class="nav-item has-treeview {{ isActive(['admin.permissions.index', 'admin.roles.index'] , 'menu-open') }}">
                            <a href="#" class="nav-link {{ isActive(['admin.permissions.index' , 'admin.roles.index']) }}">
                                <i class="nav-icon fa fa-lock"></i>
                                <p>
                                    بخش اجازه دسترسی
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            @can('show-roles')
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ action('App\Http\Controllers\Admin\RoleController@index') }}" class="nav-link {{ ('admin.roles.index') }}">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>همه مقام ها</p>
                                        </a>
                                    </li>
                                </ul>
                            @endcan
                            @can('show-permissions')
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ action('App\Http\Controllers\Admin\PermissionController@index') }}" class="nav-link {{ ('admin.permissions.index') }}">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>همه دسترسی ها</p>
                                        </a>
                                    </li>
                                </ul>
                            @endcan
                        </li>
                    @endcanany
                </ul>
            </nav>
        </div>
    </div>
</aside>
