<?php
extract($product);
$img_pro = $img_path_products . $img;
}               
?>
<main class="main" style="width: 60%; margin: 0 auto;">
    <div class="mb">
        <br>
        <div class="box_title" style="font-size: 25px">Cập nhập sản phẩm mới </div>
        <br>
        <div class="box_content form_account">
            <form action="index.php?act=upsp" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="iddm" class="form-label">Danh mục</label>
                    <select name="iddm" class="form-select">
                        <option value="0" selected>Tất cả</option>
                        <?php
                        foreach ($listCT as $category){
                            extract($category);
                            echo '<option value="'.$id_category.'" '$category['id_category'] == $product['id_category']) ? 'selected' : '' ' >'.$name_category.'</option>';
                        }
                        ?>
                    </select>
                </div>
                <input type="hidden" name="id_pro" id="id_pro" value="<?=$id_pro?>">
                <div class="mb-3">
                    <label for="name_product" class="form-label">Name product</label>
                    <input type="text" name="name_product" id="name_product" class="form-control" value="<?=$name_pro?>">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" name="price" id="price" class="form-control" value="<?=$price?>">
                </div>
                <div class="mb-3">
                    <label for="img_product" class="form-label">Image</label>
                    <input type="file" name="img_product" id="img_product" class="form-control" value="<?=$img_pro?>">
                    <img src="<?php echo isset($img_pro) ? $img_pro : '' ?>" alt="No file image">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="10"><?=$description?></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" name="update_pro" class="btn btn-primary" value="Update product">
                    <input type="submit" class="btn btn-secondary" value="Reset">
                    <a href="index.php?act=product" class="btn btn-info">List product</a>
                </div>
            </form>
        </div>
    </div>
</main>

</div>
</main>
