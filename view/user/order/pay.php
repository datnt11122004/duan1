<?php
?>

<form action="">
    <tr class="summary-shipping-row">
        <td>
            <div class="custom-control custom-radio">
                <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                <label class="custom-control-label" for="free-shipping">Payment with MoMo</label>
            </div><!-- End .custom-control -->
        </td>
    </tr><!-- End .summary-shipping-row -->

    <tr class="summary-shipping-row">
        <td>
            <div class="custom-control custom-radio" id="price-1">
                <input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
                <label class="custom-control-label" for="standart-shipping">Payment with VNPay</label>
            </div><!-- End .custom-control -->
        </td>
    </tr><!-- End .summary-shipping-row -->

    <tr class="summary-shipping-estimate">
        <td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
        <td>&nbsp;</td>
    </tr><!-- End .summary-shipping-estimate -->

    <tr class="summary-total">
        <td>Total:</td>
        <td>$<?=$_SESSION['resultotal']?></td>
    </tr><!-- End .summary-total -->
</form>
