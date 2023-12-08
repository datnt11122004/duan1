
<main class="main " style="width: 60%; margin: 0 auto;">
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="mb">
                    <div class="box_title" style="font-size: 25px">Update Category</div>
                    <div class="box_content form_account">
                        <?php
                        if (is_array($category)){
                        extract($category);

                        $loadimg = $img_path_category .$img_category;
                        ?>
                        <form action="index.php?act=category&action=update_category" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="id_category" class="form-label">Id category</label>
                                <input type="text" class="form-control" name="id_category" readonly id="id_category" value="<?=$id_category?>">
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Name category</label>
                                <input type="text" class="form-control" name="name_category" id="name_category" value="<?=$name_category?>">
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image:</label>
                                <input type="file" class="form-control" name="img_category" id="img_category" value="<?=$img_category?>">
                                <img src="<?=$loadimg?>" class="" width="200px" height="300px" alt="No file image">
                            </div>

                            <button type="submit" class="btn btn-primary" name="update_category">Update</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="index.php?act=category" class="btn btn-info">List category</a>
                        </form>
                        <?php  } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
