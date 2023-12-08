<main class="main">
    <div class="page-content mt-3 text-center">
        <div class="box_title" style="font-size: 25px">List product</div> <br>
        <div class="container mt-3">
            <div class="row">
                <div class="col-12">
                    <form action="index.php?act=product" method="post">
                        <label for="keyword">Search by keyword</label>
                        <input type="text" name="keyword" id="keyword" class="form-control"><br>
                        <label for="id_category">Category</label>
                        <select name="id_category" id="id_category" class="form-control">
                            <option selected>Tất cả</option>
                            <?php
                            foreach ($listCT as $category){
                                extract($category);
                                echo"<option value=".$id_category.">$name_category</option>";
                            }
                            ?>
                        </select>
                        <input type="submit" class="btn btn-primary mt-3" value="search" name="search">
                    </form>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row form_content">
                <div class="col-12">
                    <form action="#" method="POST">
                        <div class="row mb-3">
                            <div class="col-md-2">
                                <a href="index.php?act=product&action=add_pro" class="btn btn-success btn-block">Add product</a>
                            </div>
                            <div class="col-md-2">
                                <a href="index.php?act=product&action=" class="btn btn-success btn-block">Statistical</a>
                            </div>
                            <!-- Thêm cột mới -->
                        </div>
                        <div class="mb-3">
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
                                        $update_product = "index.php?act=product&action=update_product&id_product=".$id_pro;
                                        $delete_product = "index.php?act=product&action=delete_product&id_product=".$id_pro;
                                        $array_img = explode(',',$img) ;
                                        echo'<tr>
                                                    <td class="text-center col-md-1">'.$id_pro.'</td>
                                                    <td class="text-center col-md-2">'.$name_pro.'</td>
                                                    <td class="text-center col-md-2">
                                                        <div class="row">
                                                        ';
                                                            foreach ($array_img as $img_product){
                                                                echo '<img class="col-xl-6 mt-3" width="100px" height="100px" src='.$img_path_product.$img_product.' alt="No file image">';
                                                            }
                                                        echo '
                                                        </div>
                                                    </td>
                                                    <td class="text-center col-md-2">'.$price.'</td>
                                                    <td class="text-center col-md-2" style="max-width: 100px; /* Độ rộng tối đa */white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                                        '.$description.'
                                                    </td>
                                                    <td class="text-center col-md-2">'.$name_category.'</td>
                                                    <td class="text-center col-md-1">
                                                        <a href='.$update_product.' class="btn btn-primary btn-sm mb-2">Update</a>
                                                        <a href='.$delete_product.' class="btn btn-danger btn-sm">Delete</a>
                                                    </td>
                                                </tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
