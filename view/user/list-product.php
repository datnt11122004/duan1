<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Grid 4 Columns<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <?php
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $productsPerPage = 9;
    $start = ($page - 1) * $productsPerPage;
    $displayedProducts = array_slice($list_pro, $start, $productsPerPage);
    ?>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                Showing <span><?=$productsPerPage?> of <?=count($list_pro)?></span> Products
                            </div><!-- End .toolbox-info -->
                        </div><!-- End .toolbox-left -->

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sort by:</label>
                                <div class="select-custom">
                                    <select name="sortby" id="sortby" class="form-control">
                                        <option value="popularity" selected="selected">Most Popular</option>
                                        <option value="rating">Most Rated</option>
                                        <option value="date">Date</option>
                                    </select>
                                </div>
                            </div><!-- End .toolbox-sort -->
                        </div><!-- End .toolbox-right -->
                    </div><!-- End .toolbox -->

                    <div class="products mb-3">
                        <div class="row justify-content-center">
                            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                <?php
                                foreach ($displayedProducts as $sp) {
                                    extract($sp);
                                    $aray_img = explode(",",$img);

                                ?>

                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <a href="index.php?act=product&&id_pro=<?=$id_pro?>">
                                            <img src="<?=$img_path_product.$aray_img[0]?>>" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="index.php?act=add_to_cart" class="btn-product btn-cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#"><?=$name_category?></a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="index.php?act=product&&id_pro=<?=$id_pro?>"><?=$name_pro?></a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $60.00
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 2 Reviews )</span>
                                        </div><!-- End .rating-container -->

                                        <div class="product-nav product-nav-thumbs">
                                            <a href="#" class="active">
                                                <img src="assets/images/products/product-4-thumb.jpg" alt="product desc">
                                            </a>
                                        </div><!-- End .product-nav -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                                <?php } ?>
                            </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->

                        </div><!-- End .row -->
                    </div><!-- End .products -->

                    <?php
                        $totalProducts = count($list_pro);
                        $totalPages = ceil($totalProducts / $productsPerPage);

                        echo '<nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">';

                                // Nút "Prev"
                                echo '<li class="page-item ' . ($page == 1 ? 'disabled' : '') . '">
                                    <a class="page-link page-link-prev" href="?page=' . ($page - 1) . '" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                        <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                    </a>
                                </li>';

                                // Các nút trang
                                for ($i = 1; $i <= $totalPages; $i++) {
                                echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '">
                                    <a class="page-link" href="?page=' . $i . '">' . $i . '</a>
                                </li>';
                                }

                                // Nút "Next"
                                echo '<li class="page-item ' . ($page == $totalPages ? 'disabled' : '') . '">
                                    <a class="page-link page-link-next" href="?page=' . ($page + 1) . '" aria-label="Next">
                                        Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                    </a>
                                </li>';

                                echo '</ul>
                        </nav>';
                    ?>
                </div><!-- End .col-lg-9 -->
                <?php
                    include "sidebar.php";
                ?>
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
