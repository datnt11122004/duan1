<main class="main">
<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
        <h1 class="page-title">My Account<span>Shop</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Account</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="dashboard">
        <div class="container">
            <div class="row">
                <aside class="col-md-4 col-lg-3">
                    <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="false">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="true">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=logout">Sign Out</a>
                        </li>
                    </ul>
                </aside><!-- End .col-lg-3 -->

                <div class="col-md-8 col-lg-9">
                    <div class="tab-content">
                        <div class="tab-pane fade" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                            <p>Hello <span class="font-weight-normal text-dark">User</span> (not <span class="font-weight-normal text-dark">User</span>? <a href="#">Log out</a>)
                                <br>
                                From your account dashboard you can view your <a href="#tab-orders" class="tab-trigger-link link-underline">recent orders</a>, manage your <a href="#tab-address" class="tab-trigger-link">shipping and billing addresses</a>, and <a href="#tab-account" class="tab-trigger-link">edit your password and account details</a>.</p>
                        </div><!-- .End .tab-pane -->

                        <div class="tab-pane fade  show active" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                            <?php
                                if(empty($listOrder)){
                            ?>
                                <p>No order has been made yet.</p>
                                <a href="index.php?act=list-product" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
                            <?php }else{ ?>
                                <div class="box_title text-center" style="font-size: 25px">Order details</div> <br>
                                <div class="container mt-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <table class="table table-cart table-mobile">
                                                    <thead>
                                                        <tr>
                                                            <th class="col-lg-2 text-center">Product</th>
                                                            <th class="col-lg-2 text-center">Price</th>
                                                            <th class="col-lg-2 text-center">Quantity</th>
                                                            <th class="col-lg-2 text-center">Total</th>
                                                            <th class="col-lg-2 text-center">Status</th>
                                                            <th class="col-lg-2 text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($listOrder as $order) : ?>
                                                        <?php
                                                        extract($order);
                                                        $idOrder = $order['id_cart'];
                                                        $array_img = explode(',' , $order['img'])
                                                        ?>
                                                        <tr>
                                                            <td class="product-col col-lg-2 text-center">
                                                                <div class="product">
                                                                    <figure class="product-media">
                                                                        <a href="index.php?act=product&id_pro=<?=$idProduct?>">
                                                                            <img src="<?=$img_path_product.$array_img[0]?>" alt="Product image">
                                                                        </a>
                                                                    </figure>

                                                                    <h3 class="product-title">
                                                                        <a href="index.php?act=product&id_pro=<?=$idProduct?>"><?=$order['name_pro']?></a>
                                                                    </h3><!-- End .product-title -->
                                                                </div><!-- End .product -->
                                                            </td>
                                                            <td class="price-col text-center"><?=$order['price']?></td>
                                                            <td class="quantity-col text-center"><?=$order['quantityProductOrder']?></td>
                                                            <td class="total-col text-center"><?= $order['price'] * $order['quantityProductOrder']?></td>
                                                            <td class="status-col text-center"><?=$order['name_status']?></td>
                                                            <td class="text-center">
                                                                <?php
                                                                //                                                                date order completed
                                                                $date_completed_order = strtotime($order['dateCompleted']);
                                                                $allowedReturnTime = 48 * 3600;
                                                                $currentTimestamp = time();
                                                                //                                                                Completed order/Cancelled order/Return order
                                                                $cancelOrder = "index.php?act=cancel-order&id-order=$idOrder" ;
                                                                $conFirmOrder = "index.php?act=confirm-order&id-order=$idOrder" ;
                                                                $returnOrder = "index.php?act=return-order&id-order=$idOrder" ;
                                                                if($order['statusOrder'] < 4 ) {
//                                                                    Cancelled
                                                                    echo '<a href="'.$cancelOrder.'" class="btn btn-cart btn-danger">Cancelled</a>';
                                                                }else if($order['statusOrder'] == 5 || $order['statusOrder'] == 7 ){
//                                                                    Completed order
                                                                    echo '<a href="'.$conFirmOrder.'" class="btn btn-cart btn-primary">Completed</a> <div class="mb-1"></div> ';
                                                                    echo '<a href="'.$returnOrder.'" class="btn btn-cart btn-primary">Return</a>';
                                                                }else if($order['statusOrder'] == 8 && ($currentTimestamp - $date_completed_order) <= $allowedReturnTime){
//                                                                    Return order
                                                                    echo '<a href="'.$returnOrder.'" class="btn btn-cart btn-dark">Return</a> <div class="mb-1"></div>';
                                                                    echo '<a href="index.php?act=product&id_pro='.$idProduct.'" class="btn btn-outline-primary-2">Buy again</a>';
                                                                }else if($order['statusOrder'] == 8 && ($currentTimestamp - $date_completed_order) > $allowedReturnTime  || $order['statusOrder'] == 6){
                                                                    echo '<a href="index.php?act=product&id_pro='.$idProduct.'" class="btn btn-outline-primary-2">Buy again</a>';
                                                                }
                                                                ?>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center" colspan="3">Delivery Shipping: <?=$order['shipping_address']?></td>
                                                            <td class="text-center" colspan="3">Delivery phone number: <?=$order['shipping_tel']?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        </div><!-- .End .tab-pane -->


                        <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                            <form action="index.php?act=update-detail" method="post" role="form">
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" name="name" class="form-control" value="<?=$_SESSION['user']['name']?>">
                                    <span class="error-message"><?=$_SESSION['error']['name'] ?? ''?></span>
                                </div><!-- End .row -->

                                <div class="form-group">
                                    <label for="phone">Phone *</label>
                                    <input type="text" name="phone" class="form-control" value="<?=$_SESSION['user']['tel']?>">
                                    <span class="error-message"><?=$_SESSION['error']['tel'] ?? ''?></span>
                                </div>

                                <div class="form-group">
                                    <label>Email address *</label>
                                    <input type="email" class="form-control" value="<?=$_SESSION['user']['email']?>">
                                    <span class="error-message"><?=$_SESSION['error']['email'] ?? ''?></span>
                                </div>

                                <div class="form-group">
                                    <label>Address *</label>
                                    <textarea class="form-control" name="address"><?=$_SESSION['user']['address']?></textarea>
                                    <span class="error-message"><?=$_SESSION['error']['address'] ?? ''?></span>
                                </div>

                                <div class="form-group password-toggle">
                                    <label for="currentPassword">Current password (leave blank to leave unchanged)</label>
                                    <input type="password" id="currentPassword" name="current-password" class="form-control" value="<?=$_SESSION['user']['pass']?>">
                                </div>

                                <div class="form-group password-toggle">
                                    <label>New password (leave blank to leave unchanged)</label>
                                    <input type="password" id="newPassword" name="new-password" class="form-control">
                                    <span class="error-message" id="errorMessageNewPassword"></span>
                                </div>

                                <div class="form-group">
                                    <label>Confirm new password</label>
                                    <input type="password" id="confirmNewPassword" class="form-control mb-2">
                                    <span class="error-message" id="errorMessageConfirmNewPassword"></span>
                                </div>

                                <button type="submit" class="btn btn-outline-primary-2">
                                    <span>SAVE CHANGES</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>
                            </form>
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .col-lg-9 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .dashboard -->
</div><!-- End .page-content -->
</main>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var newPasswordInput = document.getElementById('newPassword');
        var confirmNewPasswordInput = document.getElementById('confirmNewPassword');
        var errorMessageNewPassword = document.getElementById('errorMessageNewPassword');
        var errorMessageConfirmNewPassword = document.getElementById('errorMessageConfirmNewPassword');
        var submitForm = document.getElementById('account-detail-form');
        function validatePassword() {
            // Reset error message
            errorMessageNewPassword.innerHTML = '';
            errorMessageConfirmNewPassword.innerHTML = '';

            var newPassword = newPasswordInput.value;
            var confirmNewPassword = confirmNewPasswordInput.value;

            if (newPassword.trim() !== '') {
                if (newPassword.length < 8) {
                    errorMessageNewPassword.innerHTML = 'The new password must have at least 8 characters.';
                    return false;
                }

                if (newPassword !== confirmNewPassword) {
                    errorMessageConfirmNewPassword.innerHTML = 'New password and confirm password do not match.';
                    return false;
                }
            }
            return true;
        }

        newPasswordInput.addEventListener('input', validatePassword);
        confirmNewPasswordInput.addEventListener('input', validatePassword);

        submitForm.addEventListener('submit', function (event) {
            if (!validatePassword()) {
                event.preventDefault();
            }
        });
    });
</script>
