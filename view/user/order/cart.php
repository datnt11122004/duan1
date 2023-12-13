<main class="main" id="main-cart">
    <div class="page-header text-center" style="background-image: url('../../../assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="index.php?act=list-product">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <?php
                    if(empty($listCart)){ ?>
                    <h2>No product in your cart</h2>
                <?php
                    }else{
                ?>
                <div class="row">
                    <div class="col-lg-9">
                        <table class="table table-cart table-mobile" >
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody id="order-table">
                            <?php
//                            var_dump($listCart);
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
//                                var_dump($productID);

                                    $arrayImg = explode(',', $productID['img'])
                                ?>
                                <tr>
                                <td class="product-col">
                                    <div class="product">
                                        <figure class="product-media">
                                            <a href="#">
                                                <img src="<?=$img_path_product.$arrayImg[0]?>" alt="Product image">
                                            </a>
                                        </figure>

                                        <h3 class="product-title">
                                            <a href="#"><?=$productID['name_pro']?></a>
                                        </h3><!-- End .product-title -->
                                    </div><!-- End .product -->
                                </td>
                                <td class="price-col"><?=$productID['price']?></td>
                                <td class="quantity-col">
                                    <div class="cart-product-quantity">
                                        <input type="number" class="form-control" id="quantity-<?=$productID['id_pro']?>" min="1" max="<?=$productID['quantity']?>" step="1" value="<?=$quantityProductCart?>" oninput="updateQuantity(<?=$productID['id_pro']?>,<?=$key?>)">
                                    </div><!-- End .cart-product-quantity -->

                                </td>
                                <td class="total-col" id="price-<?=$productID['id_pro']?>">$<?= $productID['price'] * (int)$quantityProductCart?></td>
                                <td class="remove-col"><button class="btn-remove" onclick="removeFromCart(<?=$productID['id_pro']?>)"><i class="icon-close"></i></button></td>
                            </tr>
                            <?php
                                $sum_total += $productID['price'] * $quantityProductCart ;
                            }
                            $_SESSION['resultTotal'] = $sum_total;
                            ?>
                            </tbody>
                        </table><!-- End .table table-wishlist -->

                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                <tr class="summary-subtotal">
                                    <td>Subtotal:</td>
                                    <td>$<?=$_SESSION['resultTotal']?></td>
                                </tr><!-- End .summary-subtotal -->
                                </tbody>

                            </table><!-- End .table table-summary -->

                            <a href="index.php?act=pay" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                        </div><!-- End .summary -->

                        <a href="index.php?act=list-product" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
                <?php

                }?>
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
function updateQuantity(id,index){
    // console.log(id)
    let newQuantity = $('#quantity-'+id).val();
    // console.log(newQuantity)
    if(newQuantity <= 0){
        // alert('Quantity must be greater than 0')
        newQuantity = 1;
    }

    $.ajax({
        type: 'POST',
        url: 'index.php?act=update_quantity_cart',
        data:{
            id:id,
            quantity: newQuantity
        },
        success: function (response){
            location.href = "index.php?act=list-cart"
        },
        error: function (error){
            console.log(error)
        }
    })
}

function removeFromCart(id){
    if( confirm('Remove this product from cart ?')){
        $.ajax({
            type: 'POST',
            url: 'index.php?act=remove_from_cart',
            data:{
                id:id
            },
            success: function (response){
                location.href = "index.php?act=list-cart"
            },
            error: function (error){
                console.log(error)
            }
        })
    }

}
</script>

