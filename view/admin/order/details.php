<?php extract($orderDetails);?>
<main class="main">
    <div class="page-content">
        <div class="container">
            <form class="row mt-3" role="form" method="post" action="index.php?act=order&action=update-order" >
                <div class="col-lg-6">
                    <div class="box-title" style="font-size: 25px; font-style: italic; text-align: center">
                        Delivery details
                    </div>
                    <div class="mb-5"></div>
                    <input type="hidden" name="id-order" value="<?=$id_cart?>">
                    <div class="form-group text-center">
                        <label for="name-user" class="label-limited">Name user</label>
                        <input type="text" name="name-user" class="form-control" id="" value="<?=$nameUser?>" readonly>
                    </div>
                    <div class="form-group text-center">
                        <label for="address" class="label-limited">Address</label>
                        <input type="text" name="address" class="form-control" id="" value="<?=$shipping_address?>" readonly>
                    </div>
                    <div class="form-group text-center">
                        <label for="phone" class="label-limited">Phone</label>
                        <input type="text" name="phone" class="form-control" id="" value="<?=$shipping_tel?>" readonly>
                    </div>
                    <div class="form-group text-center">
                        <label for="payment-method" class="label-limited">Payment method</label>
                        <?php if($method_payments == 0){ ?>
                            <input type="text" name="payment-method" class="form-control" id="" value="Payment on delivery" readonly>
                        <?php }else{?>
                            <input type="text" name="payment-method" class="form-control" id="" value="Online payment" readonly>
                        <?php }?>
                    </div>
                </div><!-- End col-lg-6-->
                <div class="col-lg-6">
                    <div class="box-title" style="font-size: 25px; font-style: italic; text-align: center">
                        Order product details
                    </div>
                    <div class="mb-5"></div>
                    <div class="form-group text-center">
                        <label for="name-user" class="label-limited">Product</label>
                        <input type="text" name="name-user" class="form-control" id="" value="<?=$name_pro?>" readonly>
                    </div>
                    <div class="form-group text-center">
                        <label for="name-user" class="label-limited">Quantity</label>
                        <input type="text" name="name-user" class="form-control" id="" value="<?=$quantityProductOrder?>" readonly>
                    </div>
                    <div class="form-group text-center">
                        <label for="status-order" class="label-limited">Status order</label>
                        <?php if($statusOrder == 8){ ?>
                            <input type="text" name="status-order" class="form-control" id="" value="<?=$name_status?>" readonly>
                        <?php }else{?>
                        <select name="status-order" id="status-order" class="form-control">
                            <?php foreach ($listStatusOrder as $index => $item) :?>
                                <option value="<?=$item['idStatusOrder']?>" <?=$item['idStatusOrder']==$statusOrder ? 'selected' : ''?> ><?=$item['nameStatusOrder']?></option>
                            <?php endforeach;?>
                        </select>
                        <?php }?>
                    </div>
                    <div class="form-group text-center">
                        <label for="name-user" class="label-limited">Payment status</label>
                        <?php if($payment_status == 0 ){ ?>
                            <input type="text" name="payment-status" class="form-control" id="" value="Paid" readonly>
                        <?php }else if($statusOrder == 6){ ?>
                            <input type="text" name="payment-status" class="form-control" id="" value="Unpaid" readonly>
                        <?php }else{?>
                            <select name="payment-status" id="payment-status" class="form-control">
                                <option value="0">Paid</option>
                                <option value="1" selected >Unpaid</option>
                            </select>
                        <?php }?>
                    </div>
                </div><!-- End col-lg-6-->
                <div class=" form-group col-lg-12">
                    <label for="note">Note</label>
                    <textarea class="form-control" readonly><?=$note?></textarea>
                </div>

                <?php
                    if($statusOrder !== 8 & $payment_status !== 0 & $statusOrder !== 6){
                        echo '<div class="form-group col-lg-3">
                                <button type="submit" class="btn btn-outline-info">Update</button>
                              </div>';
                    }
                ?>
                <div class="form-group col-lg-3">
                    <a href="index.php?act=order" class="btn btn-outline-primary-2">List order</a>
                </div>

            </form><!-- End form .row-->
        </div> <!-- End .container-->
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function (){
        var statusOrder = document.getElementById('status-order');
        var paymentStatus = document.getElementById('payment-status');

        statusOrder.addEventListener('change', function (){
            if (statusOrder.value === '8' ){
                paymentStatus.value = 0;
            }else {
                paymentStatus.value = 1;
            }
        })

        paymentStatus.addEventListener('change', function (){
            if (paymentStatus.value === '0' ){
                statusOrder.value = 8
            }
        })
    })
</script>