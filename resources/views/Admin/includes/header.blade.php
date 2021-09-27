<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('adminHome') }}" class="brand-link">
        <img src="{{ asset('backEnd') }}/img/AdminLTELogo.png" alt="pakland Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Pak Land</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {!! userProfile() !!}
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('adminHome') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt" style="color: #79B445"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"  style="color: #79B445"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ADD USER</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('adminUserList') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ALL</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('adminFeaturedUserList') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>FEATURED</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-home"  style="color: #79B445"></i>
                        <p>
                            PROPERTY
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('addProperty') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ADD PROPERTY</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('adminPropertyList') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ALL</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('adminFeaturedPropertyList') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>FEATURED</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('adminSoldPropertyList') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SOLD</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('adminInactivePropertyList') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>INACTIVE</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('adminDeletedPropertyList') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>DELETED</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-blog"  style="color: #79B445"></i>
                        <p>
                            Blogs
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('adminAddBlogHtml') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ADD Blog</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('adminBlogsList') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blog List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list-alt"  style="color: #79B445"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('addBlogCategory') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ADD Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('showCategory') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-id-card"  style="color: #79B445"></i>
                        <p>
                            Contact Us
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('adminContactUsList') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('adminContactUsActionedList') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Action Taken</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('adminContactUsClosedList') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Closed Tickets</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
