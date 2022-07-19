<nav class="navbar-custom">
    <ul class="list-unstyled topbar-right-menu float-right mb-0">
        <input type="hidden" id="user_idx" value="<?php echo $_SESSION["id_usuario"]; ?>">
        <input type="hidden" id="rolx" value="<?php echo $_SESSION["id_rol"]; ?>">
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                <span class="ml-1"><?php echo $_SESSION["nombres"] ?> <?php echo $_SESSION["apellidos"] ?> <i class="mdi mdi-chevron-down"></i> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                <!-- item-->
                <a href="../Logout/logout.php" class="dropdown-item notify-item">
                    <i class="dripicons-power"></i> <span>Logout</span>
                </a>

            </div>
        </li>
    </ul>
    <ul class="list-unstyled menu-left mb-0">
        <li class="float-left">
            <a href="../Home/home.php" class="logo logo-light">
                <span class="logo-lg">
                    <img src="../../assets/images/logoDenti.jpeg" alt="" height="60">
                </span>
                <span class="logo-sm">
                    <img src="../../assets/images/logoDenti.jpeg" alt="" height="28">
                </span>
            </a>
        </li>
        <li class="float-left">
            <a class="button-menu-mobile open-left navbar-toggle">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>
        </li>
        <li class="app-search">
            <form>
                <input type="text" placeholder="Search..." class="form-control">
                <button type="submit" class="sr-only"></button>
            </form>
        </li>
    </ul>
</nav>
<!-- end navbar-custom -->