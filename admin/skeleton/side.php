<!-- AdminLTE style sidebar using <aside> tag -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/panady/admin/dashboard/" class="brand-link">
        <span class="brand-text font-weight-light">panady</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <div class="d-flex flex-column align-items-center my-3" style="width:100%;border-bottom:1px solid #333;padding-bottom:10px">
            <span class="rounded-circle bg-white d-flex align-items-center justify-content-center mb-2" style="width:64px; height:64px;">
                <i class="fa fa-user-circle fa-3x text-dark"></i>
            </span>
            <span class="text-white font-weight-bold" style="font-size:1rem;">John Doe</span>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <li class="nav-item">
                    <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/panady/admin/dashboard/" class="nav-link">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/panady/admin/pages/contents.php" class="nav-link">
                        <i class="nav-icon fa fa-file-text"></i>
                        <p>contents</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>
                            Articles
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                       
                        <li class="nav-item">
                            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/panady/admin/pages/upcoming-events.php" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Articles</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/panady/admin/pages/article-types.php" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Article Types</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/panady/admin/pages/photo.php" class="nav-link">
                        <i class="nav-icon fa fa-photo-video"></i>
                        <p>Photo</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/panady/admin/pages/category.php" class="nav-link">
                        <i class="nav-icon fa fa-file-text"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/panady/admin/pages/teams.php" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Teams</p>
                    </a>
                </li>
                <!--<li class="nav-item">
                    <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/panady/admin/pages/banners.php" class="nav-link">
                        <i class="nav-icon fa fa-image"></i>
                        <p>Banners</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/panady/admin/pages/articles.php" class="nav-link">
                        <i class="nav-icon fa fa-file-text"></i>
                        <p>Articles</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>
                            Events
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/panady/admin/pages/events.php" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Events</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/panady/admin/pages/upcoming-events.php" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Upcoming Events</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/panady/admin/pages/past-events.php" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Past Events</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/panady/admin/pages/photo.php" class="nav-link">
                        <i class="nav-icon fa fa-camera"></i>
                        <p>Photo</p>
                    </a>
                </li>
                      
                </li>-->


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>
                            Settings
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                       
                        <li class="nav-item">
                            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/panady/admin/pages/users.php" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>user management</p>
                            </a>
                        </li>

                    </ul>
                </li>




                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="nav-icon fa fa-sign-out"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
