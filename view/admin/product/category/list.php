<main class="main">
    <div class="page-content mt-3">
        <div class="container text-center">
            <div class="box_title" style="font-size: 25px">List Category</div> <br>
            <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Name category</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($listCT as $category) : ?>
                                    <?php
                                    extract($category);
                                    $update = "index.php?act=category&action=update_category&id_category=" . $id_category;
                                    $delete = "index.php?act=category&action=delete_category&id_category=" . $id_category;
                                    $img = $img_path_category . $img_category;
                                    ?>
                                    <tr>
                                        <td class="col-md-3 text-center"><?= $id_category ?></td>
                                        <td class="col-md-3 text-center"><?= $name_category ?></td>
                                        <td class="col-md-3 text-center">
                                            <img class=""   src="<?= $img ?>" alt="No file image">
                                        </td>
                                        <td class="col-md-3 text-center">
                                            <a href="<?= $update ?>" class="btn btn-primary btn-block col-lg-2">Update</a>
                                            <a href="<?= $delete ?>" class="btn btn-danger btn-block col-lg-2">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <input class="btn btn-primary btn-block" type="button" value="Select all">
                            </div>
                            <div class="col-md-3">
                                <input class="btn btn-secondary btn-block" type="button" value="Unselect">
                            </div>
                            <div class="col-md-3">
                                <a href="index.php?act=category&action=add_category" class="btn btn-success btn-block">Add category</a>
                            </div>
                            <!-- Thêm cột mới -->
                            <div class="col-md-3">
                                <!-- Nút hoặc nội dung cho cột thứ tư -->
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</main>