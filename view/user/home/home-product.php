<div class="container">
    <div class="heading heading-center mb-3">
        <h2 class="title-lg">Trendy Products</h2><!-- End .title -->

        <ul class="nav nav-pills justify-content-center" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="trendy-all-link" data-toggle="tab" href="#trendy-all-tab" role="tab" aria-controls="trendy-all-tab" aria-selected="true">All</a>
            </li>
            <?php foreach ($listCT as $category){
                extract($category);
            ?>
            <li class="nav-item">
                <a class="nav-link" id="trendy-<?=$name_category?>-link" data-toggle="tab" href="#trendy-<?=$name_category?>-tab" role="tab" aria-controls="trendy-<?=$name_category?>-tab" aria-selected="false"><?=$name_category?></a>
            </li>
            <?php }?>
        </ul>
    </div><!-- End .heading -->

    <div class="tab-content tab-content-carousel">
        <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel" aria-labelledby="trendy-all-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                 data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true,
                                        "dots": false
                                    }
                                }
                            }'>
                <?php
                $product = load_product_list(0,'');
                foreach ($product as $value){
                    extract($value);
                    $array_img = explode(',',$img);
                ?>
                <div class="product product-11 text-center">
                    <figure class="product-media">
                        <a href="../product.html">
                            <img src="<?=$img_path_product.$array_img[0]?>" alt="Product image" class="product-image">
                            <img src="<?=$img_path_product.$array_img[1]?>" alt="Product image" class="product-image-hover">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                        </div><!-- End .product-action-vertical -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <h3 class="product-title"><a href="index.php?act=product&id_pro=<?=$id_pro?>"><?=$name_pro?></a></h3><!-- End .product-title -->
                        <div class="product-price">
                            $251,00
                        </div><!-- End .product-price -->
                    </div><!-- End .product-body -->
                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                    </div><!-- End .product-action -->
                </div><!-- End .product -->
                <?php }?>
            </div><!-- End .owl-carousel -->
        </div><!-- .End .tab-pane -->
        <?php foreach ($listCT as $category){
        extract($category);
        $categoryID = $id_category;
        $product_by_category = load_product_list($categoryID,'');
        ?>
        <div class="tab-pane p-0 fade" id="trendy-<?=$name_category?>-tab" role="tabpanel" aria-labelledby="trendy-<?=$name_category?>-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                 data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true,
                                        "dots": false
                                    }
                                }
                            }'>
                <?php foreach ($product_by_category as $value ){
                    extract($value);
                    $array_img = explode(',', $img);
                ?>
                <div class="product product-11 text-center">
                    <figure class="product-media">
                        <a href="index.php?act=product&id_pro=<?=$id_pro?>">
                            <img src="<?=$img_path_product.$array_img[0]?>" alt="Product image" class="product-image">
                            <img src="<?=$img_path_product.$array_img[1]?>" alt="Product image" class="product-image-hover">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                        </div><!-- End .product-action-vertical -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <h3 class="product-title"><a href="index.php?act=product&id_pro=<?=$id_pro?>">Butler Stool Ladder</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            $<?=$price?>
                        </div><!-- End .product-price -->
                    </div><!-- End .product-body -->
                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                    </div><!-- End .product-action -->
                </div><!-- End .product -->
                <?php }?>
            </div><!-- End .owl-carousel -->
        </div><!-- .End .tab-pane -->
        <?php }?>
    </div><!-- End .tab-content -->
</div><!-- End .container -->
