<main class="main text-center" style="width: 60%; margin: 0 auto;">
    <div class="mb">
        <br>
        <div class="box_title" style="font-size: 25px">Add category</div> <br>
        <div class="box_content form_account">
            <form action="index.php?act=category&action=add_category" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name_category">Name category</label>
                    <input type="text" class="form-control" name="name_category" id="name_category">
                    <span style="color: red"><?= $_SESSION['error']['name_category'] ?? '' ?></span>
                </div>
                <br>
                <div class="form-group">
                    <label for="img_category">Image category</label>
                    <input type="file" class="form-control" name="img_category" id="img_category">
                    <span style="color: red"><?= $_SESSION['error']['img_category'] ?? '' ?></span>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="add_category">Add category</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="index.php?act=category" class="btn btn-info">List Category</a>
            </form>
        </div>
    </div>
</main><!-- End .main -->
<?php unset($_SESSION['error'])?>
