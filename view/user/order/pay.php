<main class="main">
    <div class="page-content">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">
                Thanh toán</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?act=list-cart">List cart </a></li>
                <li class="breadcrumb-item active" aria-current="page">Payment</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <div class="checkout-discount">
                    <input type="text" class="form-control" required id="checkout-discount-input">
                    <label for="checkout-discount-input" class="text-truncate">Do you have a discount code?<span>Enter discount code</span></label>
                </div><!-- End .checkout-discount -->
                <form action="index.php?act=checkout" method="post">
                    <div class="row">
                        <div class="col-lg-4">
                            <h2 class="checkout-title">
                                Payment details
                            </h2><!-- End .checkout-title -->
                            <?php var_dump($_SESSION['cart']);
                            extract($_SESSION['user']); ?>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" value="<?= $name ?>" name="name">
                                    <span class="error-message"><?= $_SESSION['error']['name'] ?? '' ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" value="<?= $address ?>" name="address">
                                    <span class="error-message"><?= $_SESSION['error']['address'] ?? '' ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="tel">Phone</label>
                                    <input type="text" class="form-control" value="<?= $tel ?>" name="tel">
                                    <span class="error-message"><?= $_SESSION['error']['tel'] ?? '' ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="note">Note</label>
                                    <textarea name="note" class="form-control" cols="30" rows="4" placeholder="Notes about your order"></textarea>
                                </div>

                        </div><!-- End .col-lg-4 -->
                        <aside class="col-lg-8">
                            <div class="summary">
                                <h3 class="summary-title">
                                    Đơn hàng của bạn</h3><!-- End .summary-title -->
                                <table class="table table-summary">
                                    <thead>
                                    <tr>
                                        <th class="">Product</th>
                                        <th class="">Price</th>
                                        <th class="">Quantity</th>
                                        <th class="">Total product price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
//                                      var_dump($listCart);
                                        $sum_total = 0 ;
                                        foreach ($listCart as $key => $productID){
                                            $quantityProductCart = 0;
            //                                print_r($productID);
                                                foreach ($_SESSION['cart'] as $item) {
                                                    if ($item['id'] == $productID['id_pro']) {
                                                        $quantityProductCart = $item['quantity'];
                                                        break;
                                                    }
                                                }
                                    ?>
                                    <tr>
                                        <td class=""><?=$productID['name_pro']?></td>
                                        <td class=""><?=$productID['price']?></td>
                                        <td class=""><?=$quantityProductCart?></td>
                                        <td class="" id="price-<?=$productID['id_pro']?>">$<?= $productID['price'] * (int)$quantityProductCart?></td>
                                    </tr>
                                    <?php }?>
                                    <tr class="summary-subtotal">
                                        <td>Total:</td>
                                        <td></td>
                                        <td></td>
                                        <td id="resultTotal"> $<?php echo $_SESSION['resultTotal']?></td>
                                    </tr><!-- End .summary-subtotal -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <div class="accordion-summary" id="accordion-payment">
                                    <div class="card">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="redirect" class="custom-control-input" value="delivery" id="delivery">
                                            <label class="custom-control-label" for="delivery">Payment on delivery </label>
                                        </div><!-- End .custom-control -->
                                    </div><!-- End .card -->

                                    <input name="order" type="submit" class="btn btn-outline-primary-2 btn-order btn-block" value="Order">

                                </div> <!-- End .accordion-summary-->

                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-8 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
<?php unset($_SESSION['error'])?>
