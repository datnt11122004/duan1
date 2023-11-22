<main class="main" style="width: 60%; margin: 0 auto;">
    <br>
    <br>
    <div class="box_title" style="font-size: 25px">Danh sách sản phẩm</div> <br>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <form action="index.php?act=listsp" method="post">
                    <label for="kyw">Tìm kiếm theo tên</label>
                    <input type="text" name="kyw" id="kyw" class="form-control"><br>
                    <label for="iddm">Chọn danh mục</label>
                    <select name="iddm" id="iddm" class="form-control">
                        <option value="0" selected>Tất cả</option>
                        <?php
                        foreach ($listCT as $category){
                            extract($category);
                            echo"<option value=".$id_category.">$name_category</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" class="btn btn-primary mt-3" value="Tìm kiếm" name="listok">
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row form_content">
            <div class="col-12">
                <form action="#" method="POST">
                    <div class="mb-3 formds_loai">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center col-md-1">Id</th>
                                    <th class="text-center col-md-2">Name product</th>
                                    <th class="text-center col-md-2">Image</th>
                                    <th class="text-center col-md-2">Price</th>
                                    <th class="text-center col-md-2">Description</th>
                                    <th class="text-center col-md-2">Category</th>
                                    <th class="text-center col-md-1">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($product as $value){
                                    extract($value);
                                    $update_product = "index.php?act=product&action=update_product&id_pro".$id_pro;
                                    $delete_product = "index.php?act=product&action=delete_product&id_pro=".$id;
                                    $img_product = $img_path_product . $img;
                                    echo'<tr>
                                                <td class="text-center col-md-1">'.$id_product.'</td>
                                                <td class="text-center col-md-2">'.$name_pro.'</td>
                                                <td class="text-center col-md-2"><img src='.$img_product.' alt="No file image"></td>
                                                <td class="text-center col-md-2">'.$price.'</td>
                                                <td class="text-center col-md-2">'.$description.'</td>
                                                <td class="text-center col-md-2">'.$name_category.'</td>
                                                <td class="text-center col-md-1">
                                                    <a href='.$update_product.' class="btn btn-primary btn-sm">Update</a>
                                                    <a href='.$delete_product.' class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <a href="index.php?act=product&action=add_pro" class="btn btn-success btn-block">Add product</a>
                        </div>
                        <div class="col-md-2">
                            <a href="index.php?act=product&action=" class="btn btn-success btn-block">Statistical</a>
                        </div>
                        <!-- Thêm cột mới -->
                        <div class="col-md-6">
                            <!-- Nút hoặc nội dung cho cột thứ tư -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
