<div class="container">
    <div class="heading heading-center mb-6">
        <h2 class="title">Recent Arrivals</h2><!-- End .title -->

        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="top-all-link" data-toggle="tab" href="#top-all-tab" role="tab" aria-controls="top-all-tab" aria-selected="true">All</a>
            </li>
        </ul>
    </div><!-- End .heading -->

    <div class="tab-content">
        <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
            <div class="products">
                <div class="row justify-content-center">
                    <?php
                        $i = 0;
                        foreach ($list_product as $value){
                            extract($value);
                            $array_img = explode(',',$img);
                            if ($i == 4 ){
                                break;
                            }
                    ?>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product product-11 mt-v3 text-center">
                            <figure class="product-media">
                                <a href="index.php?act=product&id_pro=<?=$id_pro?>">
                                    <img src="<?= $img_path_product.$array_img[0]?>" alt="Product image" class="product-image">
                                    <img src="<?= $img_path_product.$array_img[1]?>" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="index.php?act=product&id_pro=<?=$id_pro?>"><?=$name_pro?></a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <?=$price?>
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                    <?php $i++; }?>
                </div><!-- End .row -->
            </div><!-- End .products -->
        </div><!-- .End .tab-pane -->
    </div><!-- End .tab-content -->
    <div class="more-container text-center">
        <a href="index.php?act=list-product" class="btn btn-outline-darker btn-more"><span>Load more products</span><i class="icon-long-arrow-down"></i></a>
    </div><!-- End .more-container -->
</div><!-- End .container -->