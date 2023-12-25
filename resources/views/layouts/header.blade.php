<!--**********************************
    Nav header start
***********************************-->
<div class="nav-header">
    <div class="brand-logo">
        <a href="index.html">
            <b class="logo-abbr text-lg text-white">LDK</b>
            <span class="logo-compact text-lg text-white">LDK</span>
            <span class="brand-title text-lg text-white">
                {{ config('app.name') }}
            </span>
        </a>
    </div>
</div>
<!--**********************************
    Nav header end
***********************************-->

<!--**********************************
    Header start
***********************************-->
<div class="header">    
    <div class="header-content clearfix">
        
        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                        <span>
                            Hello, {{ Auth::user()->name }}
                        </span>
                        <span class="activity active"></span>
                        <img src="/assets/images/user/1.png" height="40" width="40" alt="">
                    </div>
                    <div class="drop-down dropdown-profile   dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon-user"></i> <span>Profile</span></a>
                                </li>
                                <li><a href="/logout"><i class="icon-key"></i> <span>Logout</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--**********************************
    Header end ti-comment-alt
***********************************-->
