<div class="page-wrapper">
    <header class="header">
        <div class="header-top">
            <div class="container">
                <div class="header-right">
                    <ul class="top-menu">
                        <li>
                            <a href="#">Links</a>
                            <ul>
                                <?php
                                    if(!isset($_SESSION['user'])) {
                                        echo '<li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Login</a></li>';
                                    }else{
                                        echo '<li><a href="index.php?act=detail">'.$_SESSION['user'].'</a></li>';
                                    }

                                ?>
                                <li><a href="index.php?act=logout">log out</a></li>
                            </ul>
                        </li>
                    </ul><!-- End .top-menu -->
                </div><!-- End .header-right -->
            </div><!-- End .container -->
        </div><!-- End .header-top -->

        <div class="header-middle sticky-header">
            <div class="container">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="index.php" class="logo">
                    <img src="assets/images/logo.png" alt="Molla Logo" width="105" height="25">
                </a>

                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="">
                            <a href="index.php" class="">Home</a>
                        </li>
                        <li>
                            <a href="index.php?act=category" class="">Category</a>
                        </li>
                        <li>
                            <a href="index.php?act=product" class="">Product</a>
                        </li>
                        <li>
                            <a href="index.php?act=order" class="">Order</a>
                        </li>
                        <li>
                            <a href="index.php?act=account" class="">Account</a>
                        </li>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .container -->
        </div><!-- End .header-middle -->
    </header><!-- End .header -->
