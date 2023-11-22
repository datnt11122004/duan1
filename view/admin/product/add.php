<main class="main text-center" style="width: 60%; margin: 0 auto;">

    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="mb">
                    <br>
                    <div class="box_title" style="font-size: 25px">THÊM MỚI SẢN PHẨM</div>
                    <br>
                    <div class="box_content form_account">
                        <form action="index.php?act=product&action=add_pro" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" name="category">
                                    <?php
                                    foreach ($listdanhmuc as $category){
                                        extract($category);
                                        echo "<option value=".$id_category.">$name_category</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="name_pro" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name_pro" id="name_pro">
                            </div>

                            <div class="mb-3">
                                <label for="price_pro" class="form-label">Price</label>
                                <input type="text" class="form-control" name="price_pro" id="price_pro">
                            </div>


                            <div class="mb-3">
                                <label for="img" class="form-label">Image</label>
                                <input type="file" class="form-control" name="img" id="img" multiple>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary" name="add">Add</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="index.php?act=listpro" class="btn btn-info">List product</a>
                            <br>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>