<main class="main" style="width: 78%; margin: 0 auto;">
    <br>
    <br>
    <div class="box_title" style="font-size: 25px; text-align: center; margin-bottom: 10px;">Đơn hàng</div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                    <div class="mb-3 formds_loai">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Phone number</th>
                                <th class="text-center">Order date</th>
                                <th class="text-center">Note</th>
                                <th class="text-center">Product</th>
                                <th class="text-center">Color</th>
                                <th class="text-center">Size</th>
                                <th class="text-center">Total amount</th>
                                <th class="text-center">Shipping method</th>
                                <th class="text-center">Payment methods</th>
                                <th class="text-center">Into money</th>
                                <th class="text-center"> Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($listdh1 as $dh) : ?>
                                <?php
                                extract($dh);
                                $ht = $dh['tinhtrangdh']
                                ?>
                                <tr>
                                    <td class="col-md-1 text-center"><?= $name ?></td>
                                    <td class="col-md-1 text-center"><?= $diachi  ?></td>
                                    <td class="col-md-1 text-center"><?= $sdt ?></td>
                                    <td class="col-md-1 text-center"><?= $ngaydathang ?></td>
                                    <td class="col-md-1 text-center"><?= $ghichu ?></td>
                                    <td class="col-md-1 text-center"><?= $tensach ?></td>
                                    <td class="col-md-1 text-center"><?= $mau ?></td>
                                    <td class="col-md-1 text-center"><?= $size ?></td>
                                    <td class="col-md-1 text-center"><?= $tongtien ?></td>
                                    <td class="col-md-1 text-center"><?php
                                        if ($ptvc == 30000){
                                            echo "Fast Shipping";
                                        }else{
                                            echo "Slow shipping";
                                        }
                                        ?> </td>
                                    <td class="col-md-1 text-center"><?= $phuong_thuc_thanhtoan ?></td>
                                    <td class="col-md-1 text-center"><?= $tt=$tongtien+$ptvc ?></td>
                                    <td class="col-md-1 text-center">
                                        <?php
                                        switch ( $ht){
                                            case "0" :
                                                echo "New orders";
                                                break;
                                            case "1" :
                                                echo"Order confirmation";
                                                break;
                                            case "2" :
                                                echo "Delivering";
                                                break;
                                            case "3" :
                                                echo "Delivered";
                                                break;
                                            default:
                                                break;
                                        } ?>
                                        <form action="index.php?act=tinhtrang" method="post">
                                            <input type="hidden" name="id" id="id" value="<?=$id?>">
                                            <select name="tinhtrang">
                                                <option value="0">New orders</option>
                                                <option value="1">Order confirmation</option>
                                                <option value="2">Delivering</option>
                                                <option value="3">Delivered</option>
                                            </select>
                                            <input class="btn btn-primary btn-block" type="submit" name="gui" value="Update">
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</main>
