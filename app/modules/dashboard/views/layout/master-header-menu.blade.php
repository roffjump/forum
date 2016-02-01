
<div class="page-header-menu">
    <div class="container-fluid">
        <!-- BEGIN HEADER SEARCH BOX -->
        <form class="search-form" action="javascript:;" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="query">
                <span class="input-group-btn">
                    <a href="javascript:;" class="btn submit">
                        <i class="icon-magnifier"></i>
                    </a>
                </span>
            </div>
        </form>
        <!-- END HEADER SEARCH BOX -->
        <!-- BEGIN MEGA MENU -->
        <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
        <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
        <div class="hor-menu  ">
            <ul class="nav navbar-nav">
                <li class="menu-dropdown classic-menu-dropdown ">
                    <a href="javascript:;"> Forum
                        <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li class="dropdown-submenu ">
                            <a href="/forum" class="nav-link nav-toggle ">
                                <i class="icon-bulb"></i> Topics
                                <span class="arrow"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class=" ">
                                    <a href="/forum" class="nav-link "> List 
                                    <span class="badge badge-success">{{ TopicController::count() }}</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="/forum/topic/create" class="nav-link "> Create
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END MEGA MENU -->
    </div>
</div>