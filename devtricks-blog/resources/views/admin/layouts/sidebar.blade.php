<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu Quản lý
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1">Thể loại <span class="badge badge-success">6</span></a>
                        <div id="submenu-1" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{asset('admin/category/list')}}">Danh sách thể loại</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{asset('admin/category/add')}}">Thêm thể loại</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2">Tin tức</a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{asset('admin/news/list')}}">Danh sách tin tức <span class="badge badge-secondary"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{asset('admin/news/add')}}">Thêm Tin tức</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3">Menu</a>
                        <div id="submenu-3" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{asset('admin/menu/list')}}">Danh sách menu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{asset('admin/menu/add')}}">Thêm menu</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4">Liên hệ</a>
                        <div id="submenu-4" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{asset('admin/contact/list')}}">Danh sách liên hệ</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5">Người dùng</a>
                        <div id="submenu-5" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{asset('admin/users/list')}}">Danh sách người dùng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{asset('admin/users/add')}}">Thêm người dùng</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-divider">
                        cấu hình website
                    </li>
{{--                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6">Pages</a>
                        <div id="submenu-6" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="invoice">Invoice</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="blank-page">Blank Page</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="blank-page-header">Blank Page Header</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="login">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="404-page">404 page</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="sign-up">Sign up Page</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="forgot-password">Forgot Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pricing">Pricing Tables</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="timeline">Timeline</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="calendar">Calendar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="sortable-nestable-lists">Sortable/Nestable List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="widgets">Widgets</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="media-object">Media Objects</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="cropper-image">Cropper</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="color-picker">Color Picker</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7">Apps <span class="badge badge-secondary">New</span></a>
                        <div id="submenu-7" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="inbox">Inbox</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="email-details">Email Detail</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="email-compose">Email Compose</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="message-chat">Message Chat</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8">Icons</a>
                        <div id="submenu-8" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="icon-fontawesome">FontAwesome Icons</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="icon-material">Material Icons</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="icon-simple-lineicon">Simpleline Icon</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="icon-themify">Themify Icon</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="icon-flag">Flag Icons</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="icon-weather">Weather Icon</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9">Maps</a>
                        <div id="submenu-9" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="map-google">Google Maps</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="map-vector">Vector Maps</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-10">Menu Level</a>
                        <div id="submenu-10" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Level 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-11" aria-controls="submenu-11">Level 2</a>
                                    <div id="submenu-11" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Level 1</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Level 2</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Level 3</a>
                                </li>
                            </ul>
                        </div>
                    </li>--}}
                </ul>
            </div>
        </nav>
    </div>
</div>
