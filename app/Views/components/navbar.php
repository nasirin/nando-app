<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="/assets/img/admin/<?= session('img') ?>" alt=""><?= ucwords(session('nama')) ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="#"> Profile</a></li>
                        <li><a href="/auth/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="#laporan" class="user-profile" data-toggle="modal">
                        <i class="fa fa-book"> Laporan</i>
                    </a>
                </li>
                <li class="">
                    <a href="#" class="user-profile">
                        <i class="fa fa-puzzle-piece"> Kebutuhan</i>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</div>