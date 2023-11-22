<?php
if (is_array($category)){
    extract($category);
}
$loadhinh = $img_path_category .$img;
?>
<main class="main" style="width: 60%; margin: 0 auto;">
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="mb">
                    <div class="box_title" style="font-size: 25px">Update Category</div>
                    <div class="box_content form_account">
                        <form action="index.php?act=update" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_category" value="<?=$id_category?>">

                            <div class="mb-3">
                                <label for="tenloai" class="form-label">Tên Loại:</label>
                                <input type="text" class="form-control" name="tenloai" id="tenloai" value="<?=$ten_danh_muc?>">
                            </div>

                            <div class="mb-3">
                                <label for="hinh" class="form-label">Ảnh sản phẩm:</label>
                                <input type="file" class="form-control" name="hinh" id="hinh">
                                <?php if(isset($hinh)) { echo $hinh; } ?>
                            </div>

                            <button type="submit" class="btn btn-primary" name="capnhat">Cập nhật</button>
                            <button type="reset" class="btn btn-secondary">Nhập lại</button>
                            <a href="index.php?act=listdm" class="btn btn-info">Danh Sách</a>
                        </form>

                        <p>
                            <?php
                            if(isset($thongbao) && ($thongbao !="")){
                                echo $thongbao;
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
