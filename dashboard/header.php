<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="../theme/dist/assets/images/logo-sm-dark.png" alt="" height="22">
                                </span>
                    <span class="logo-lg">
                                    <img src="../theme/dist/assets/images/logo-dark.png" alt="" height="20">
                                </span>
                </a>

                <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="../theme/dist/assets/images/logo-sm-light.png" alt="" height="22">
                                </span>
                    <span class="logo-lg">
                                    <img src="../theme/dist/assets/images/logo-light.png" alt="" height="20">
                                </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-backburger"></i>
            </button>

        </div>

        <div class="d-flex">

            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect" >
                <i class="mdi mdi-account-alert"></i>
            </button>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="../theme/dist/assets/user.png" alt="Header Avatar">
                    <span class="d-none d-sm-inline-block ml-1"><?php echo $_SESSION['nama_akun']; ?></span>
                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="../logout.php"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>