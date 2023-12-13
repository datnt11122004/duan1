<?php
if (!empty($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $idProduct = array_column($cart, 'id');
    $idList = implode(',', $idProduct);
    $listCart = load_product_cart($idList);

    $sum_total = 0;

    foreach ($listCart as $key => $productID) {
        $quantityProductCart = 0;

        foreach ($_SESSION['cart'] as $item) {
            if ($item['id'] == $productID['id_pro']) {
                $quantityProductCart = $item['quantity'];
                break;
            }
        }

        $arrayImg = explode(',', $productID['img']);
        ?>
        <tr>
            <td class="product-col">
                <div class="product">
                    <figure class="product-media">
                        <a href="#">
                            <img src="<?= $img_path_product . $arrayImg[0] ?>" alt="Product image">
                        </a>
                    </figure>
                    <h3 class="product-title">
                        <a href="#"><?= $productID['name_pro'] ?></a>
                    </h3><!-- End .product-title -->
                </div><!-- End .product -->
            </td>
            <td class="price-col"><?= $productID['price'] ?></td>
            <td class="quantity-col">
                <div class="cart-product-quantity">
                    <input type="number" class="form-control" id="quantity-<?= $productID['id_pro'] ?>" min="1"
                           max="<?= $productID['quantity'] ?>" step="1" value="<?= $quantityProductCart ?>"
                           oninput="updateQuantity(<?= $productID['id_pro'] ?>,<?= $key ?>)">
                </div><!-- End .cart-product-quantity -->
            </td>
            <td class="total-col">$<?= $productID['price'] * $quantityProductCart ?></td>
            <td class="remove-col"><button class="btn-remove"
                                           onclick="removeFromCart(<?= $productID['id_pro'] ?>)"><i
                            class="icon-close"></i></button></td>
        </tr>
        <?php
        $sum_total += $productID['price'] * $quantityProductCart;
    }
    $_SESSION['resultTotal'] = $sum_total;
}

// Update the total after processing all products
?>
