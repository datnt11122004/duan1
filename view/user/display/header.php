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
                                        echo '<li><a href="index.php?act=detail">'.$_SESSION['user'].'</a></li>';
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
                                                <div class="menu-title">Product Details</div><!-- End .menu-title -->
                                                <ul>
                                                    <li><a href="../product.html">Default</a></li>
                                                </ul>
                                            </div><!-- End .menu-col -->
                                        </div><!-- End .col-md-6 -->

                                        <div class="col-md-6">
                                            <div class="banner banner-overlay">
                                                <a href="category.html" class="banner banner-menu">
                                                    <img src="assets/images/menu/banner-1.jpg" alt="Banner">

                                                    <div class="banner-content banner-content-top">
                                                        <div class="banner-title text-white">Last <br>Chance<br><span><strong>Sale</strong></span></div><!-- End .banner-title -->
                                                    </div><!-- End .banner-content -->
                                                </a>
                                            </div><!-- End .banner banner-overlay -->
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
                        <form action="index.php?act=list-product" method="get">
                            <div class="header-search-wrapper">
                                <label for="keyword" class="sr-only">Search</label>
                                <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Search in..." required>
                            </div><!-- End .header-search-wrapper -->
                        </form>
                    </div><!-- End .header-search -->

                    <div class="dropdown cart-dropdown">
                        <a href="" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count" id="totalCart"><?= !empty($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></span>
                        </a>
                        <?php
                            if(!empty($_SESSION['cart'])) {
                                echo '
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-cart-products">
                                            <div class="product">
                                                <div class="product-cart-details">
                                                    <h4 class="product-title">
                                                        <a href="../product.html">Beige knitted elastic runner shoes</a>
                                                    </h4>
            
                                                    <span class="cart-product-info">
                                                            <span class="cart-product-qty">1</span>
                                                            x $84.00
                                                        </span>
                                                </div><!-- End .product-cart-details -->
            
                                                <figure class="product-image-container">
                                                    <a href="../product.html" class="product-image">
                                                        <img src="assets/images/products/cart/product-1.jpg" alt="product">
                                                    </a>
                                                </figure>
                                                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                            </div><!-- End .product -->
            
                                            <div class="product">
                                                <div class="product-cart-details">
                                                    <h4 class="product-title">
                                                        <a href="../product.html">Blue utility pinafore denim dress</a>
                                                    </h4>
            
                                                    <span class="cart-product-info">
                                                            <span class="cart-product-qty">1</span>
                                                            x $76.00
                                                        </span>
                                                </div><!-- End .product-cart-details -->
            
                                                <figure class="product-image-container">
                                                    <a href="../product.html" class="product-image">
                                                        <img src="assets/images/products/cart/product-2.jpg" alt="product">
                                                    </a>
                                                </figure>
                                                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                            </div><!-- End .product -->
                                        </div><!-- End .cart-product -->
            
                                        <div class="dropdown-cart-total">
                                            <span>Total</span>
                                            <span class="cart-total-price">$160.00</span>
                                        </div><!-- End .dropdown-cart-total -->
            
                                        <div class="dropdown-cart-action">
                                            <a href="?act=list-cart" class="btn btn-primary">View Cart</a>
                                        </div><!-- End .dropdown-cart-total -->
                                    </div><!-- End .dropdown-menu -->';
                            }
                        ?>
                    </div><!-- End .cart-dropdown -->
                </div><!-- End .header-right -->
            </div><!-- End .container -->
        </div><!-- End .header-middle -->
    </header><!-- End .header -->
