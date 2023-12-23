<div class="page-wrapper">
    <header class="header">
        <div class="header-top">
            <div class="container">

                <div class="header-right">
                    <ul class="top-menu">
                        <li>
                            <a href="#">Links</a>
                            <ul>
                                <li><a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a></li>
                                <li><a href="index.php?act=wishlist"><i class="icon-heart-o"></i>My Wishlist <span>(3)</span></a></li>
                                <li><a href="index.php?act=about">About Us</a></li>
                                <li><a href="index.php?act=contact">Contact Us</a></li>
                                <?php
                                    if(!isset($_SESSION['user'])) {
                                        echo '<li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Login</a></li>';
                                    }else{
                                        echo '<li><a href="index.php?act=detail">'.$_SESSION['user']['name'].'</a></li>';
                                    }

                                ?>
                            </ul>
                        </li>
                    </ul><!-- End .top-menu -->
                </div><!-- End .header-right -->
            </div><!-- End .container -->
        </div><!-- End .header-top -->

        <div class="header-middle sticky-header">
            <div class="container">
                <div class="header-left">
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
                                <a href="index.php?act=list-product" class="sf-with-ul">Shop</a>

                                <div class="megamenu megamenu-sm">
                                    <div class="row no-gutters">
                                        <div class="col-md-6">
                                            <div class="menu-col">
                                                <div class="menu-title">Category</div><!-- End .menu-title -->
                                                <ul>
                                                    <?php foreach ($listCT as $key => $value){?>
                                                        <li><a href="index.php?act=list-product&id_category=<?=$value['id_category']?>"><?=$value['name_category']?></a></li>
                                                    <?php }?>
                                                </ul>
                                            </div><!-- End .menu-col -->
                                        </div><!-- End .col-md-6 -->

                                        <div class="col-md-6">
                                            <div class="menu-col">
                                                <div class="menu-title">Product</div><!-- End .menu-title -->
                                                <ul>
                                                    <?php foreach ($listCT as $key => $value){?>
                                                        <li><a href="index.php?act=list-product&id_category=<?=$value['id_category']?>"><?=$value['name_category']?></a></li>
                                                    <?php }?>
                                                </ul>
                                            </div><!-- End .menu-col -->
                                        </div><!-- End .col-md-6 -->
                                    </div><!-- End .row -->

                                </div><!-- End .megamenu megamenu-md -->
                            </li>
                            <li>
                                <a href="#" class="">New</a>
                            </li>
                            <li>
                                <a href="index.php?act=about" class="">About</a>
                            </li>
                            <li>
                                <a href="index.php?act=contact" class="">Contact</a>
                            </li>
                        </ul><!-- End .menu -->
                    </nav><!-- End .main-nav -->
                </div><!-- End .header-left -->

                <div class="header-right">
                    <div class="header-search">
                        <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                        <form action="index.php?act=list-product" method="post">
                            <div class="header-search-wrapper">
                                <label for="keyword" class="sr-only">Search</label>
                                <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Search in..." required>
                            </div><!-- End .header-search-wrapper -->
                        </form>
                    </div><!-- End .header-search -->

                    <div class="dropdown cart-dropdown">
                        <a href="index.php?act=list-cart" class="dropdown-toggle"  data-display="static">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count" id="totalCart"><?= !empty($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></span>
                        </a>
                    </div><!-- End .cart-dropdown -->
                </div><!-- End .header-right -->
            </div><!-- End .container -->
        </div><!-- End .header-middle -->
    </header><!-- End .header -->
