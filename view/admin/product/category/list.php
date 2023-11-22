<main class="main" style="width: 60%; margin: 0 auto;">
    <div class="mb-5"></div>
    <div class="box_title" style="font-size: 25px">List Category</div> <br>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <form action="#" method="POST">
                    <div class="mb-3">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">MÃ LOẠI</th>
                                <th class="text-center">TÊN LOẠI</th>
                                <th class="text-center">HÌNH ẢNH</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($listCT as $danhmuc) : ?>
                                <?php
                                extract($danhmuc);
                                $suadm = "index.php?act=update_category&id_category=" . $id_category;
                                $xoadm = "index.php?act=xoadm&id=" . $id;
                                $hinhload = "../upload/" . $img;
                                $imgTag = is_file($hinhload) ? "<img src='" . $hinhload . "' height='80' width='80'>" : "";
                                ?>
                                <tr>
                                    <td class="col-md-3 text-center"><?= $id ?></td>
                                    <td class="col-md-3 text-center"><?= $ten_danh_muc ?></td>
                                    <td class="ol-md-3 text-center d-flex justify-content-center align-items-center"><?= $imgTag ?></td>
                                    <td class="col-md-3 text-center">
                                        <a href=<?= $suadm ?> class="btn btn-primary btn-block">Sửa</a>
                                        <a href=<?= $xoadm ?> class="btn btn-danger btn-block">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <input class="btn btn-primary btn-block" type="button" value="CHỌN TẤT CẢ">
                        </div>
                        <div class="col-md-3">
                            <input class="btn btn-secondary btn-block" type="button" value="BỎ CHỌN TẤT CẢ">
                        </div>
                        <div class="col-md-3">
                            <a href="index.php?act=adddm" class="btn btn-success btn-block">NHẬP THÊM</a>
                        </div>
                        <!-- Thêm cột mới -->
                        <div class="col-md-3">
                            <!-- Nút hoặc nội dung cho cột thứ tư -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>