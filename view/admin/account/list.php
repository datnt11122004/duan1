<main class="main text-center" style="width: 78%; margin: 0 auto;">
    <br>
    <br>
    <div class="box_title" style="font-size: 25px">Account</div> <br>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($account as $value) : ?>
                            <?php
                            extract($value);
                            $update_account = "index.php?act=account&action=update_account&id_account=".$id_user."";
                            ?>
                            <tr>
                                <td class="col-md-1 text-center"><?=$name?></td>
                                <td class="col-md-1 text-center"><?=$email?></td>
                                <td class="col-md-1 text-center"><?=$tel?></td>
                                <td class="col-md-1 text-center"><?=$role_name?></td>
                                <td class="col-md-1 text-center">
                                    <a href="<?=$update_account?>" class=" col-lg-2 btn btn-primary btn-block">Update</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
