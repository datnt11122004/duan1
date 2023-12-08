<?php
extract($product);
$img_pro = $img_path_product . $img;

?>
<main class="main" style="width: 60%; margin: 0 auto;">
    <div class="mb">
        <br>
        <div class="box_title" style="font-size: 25px">Update product </div>
        <br>
        <div class="box_content form_account">
            <form action="index.php?act=product&action=update_product" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name_product" class="form-label">Id product</label>
                    <input type="text" name="id_product" id="id_product" readonly class="form-control" value="<?=$id_pro?>">
                </div>
                <div class="mb-3">
                    <label for="name_product" class="form-label">Name product</label>
                    <input type="text" name="name_product" id="name_product" class="form-control" value="<?=$name_pro?>">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" name="price" id="price" class="form-control" value="<?=$price?>">
                </div>
                <div class="mb-3">
                    <label for="id_category" class="form-label">Category</label>
                    <select name="id_category" class="form-select form-control">
                        <?php
                        foreach ($listCT as $category){
                            extract($category);
                            ?>
                            <option value="<?=$id_category?>" <?= $category['id_category'] == $product['id_category'] ? 'selected' : '' ?> ><?=$name_category?></option>';
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="img_product" class="form-label">Image</label>
                    <input type="file" name="img_product[]" id="img_product" class="form-control" value="<?=$img?>" multiple>
                    <div class="row">
                        <?php $array_img = explode(',', $img)?>
                        <img class="col-md-3" src="<?=$img_path_product.$array_img[0]?>" width="100px" height="100px" alt="No file image">
                        <img class="col-md-3" src="<?=$img_path_product.$array_img[1]?>" width="100px" height="100px" alt="No file image">
                        <img class="col-md-3" src="<?=$img_path_product.$array_img[2]?>" width="100px" height="100px" alt="No file image">
                        <img class="col-md-3" src="<?=$img_path_product.$array_img[3]?>" width="100px" height="100px" alt="No file image">

                    </div>
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
