
<main class="main">
    <div class="page-content">
        <div class="box_title text-center" style="font-size: 25px">Order details</div> <br>
        <div class="container mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <table class="table table-cart table-mobile">
                            <thead>
                            <tr>
                                <th class="text-center">Order</th>
                                <th class="text-center">Date order</th>
                                <th class="text-center">User order</th>
                                <th class="text-center">Payment status</th>
                                <th class="text-center">Status order</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($listOrder as $order) :
                                $paymentStatus = checkPaymentMethod($order['payment_status']);
                            ?>
                                <tr>
                                    <td class="text-center"><?=$order['id_cart']?></td>
                                    <td class="text-center"><?=$order['date_order']?></td>
                                    <td class="text-center"><?=$order['nameUser']?></td>
                                    <td class="text-center"><?=$paymentStatus?></td>

                                    <td class="status-col text-center"><?=$order['name_status']?></td>
                                    <td class="text-center col-lg-1">
                                        <div class="row">
                                            <a href="index.php?act=order&action=update-order&id-order=<?=$order['id_cart']?>" style="margin-bottom: 5px" class="btn btn-primary" >View</a>
                                            <?php
                                                if($order['payment_status'] !== 0 & $order['statusOrder'] !== 8 & $order['statusOrder'] !== 6 || $order['statusOrder'] < 4){
                                                    echo '<a href="index.php?act=order&action=cancel-order&id-order='.$order['id_cart'].'"  class="btn btn-danger ">Cancel</a>';
                                                }
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
