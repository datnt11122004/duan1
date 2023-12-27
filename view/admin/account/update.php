<?php extract($account);?>
<main class="main">
    <div class="page-content">
        <div class="container">
            <form class="row mt-3" role="form" method="post" action="index.php?act=account&action=update-account" >
                <div class="col-lg-6">
                    <div class="box-title" style="font-size: 25px; font-style: italic; text-align: center">
                        Delivery details
                    </div>
                    <div class="mb-5"></div>
                    <input type="hidden" name="id-account" value="<?=$id_user?>">
                    <div class="form-group text-center">
                        <label for="name-user" class="label-limited">Name user</label>
                        <input type="text" name="name-user" class="form-control" id="" value="<?=$name?>">
                    </div>
                    <div class="form-group text-center">
                        <label for="password" class="label-limited">Password</label>
                        <input type="text" name="password" class="form-control" id="" value="<?=$pass?>">
                    </div>
                    <div class="form-group text-center">
                        <label for="role" class="label-limited">Role</label>
                        <select name="role" id="" class="form-control">
                            <?php foreach ($listRole as $key => $item){?>
                                <option value="<?=$item['role_id']?>" <?= $item['role_id'] == $role ? 'selected' : '' ?>><?=$item['role_name']?></option>
                            <?php }?>
                        </select>
                    </div>
                </div><!-- End col-lg-6-->
                <div class="col-lg-6">
                    <div class="box-title" style="font-size: 25px; font-style: italic; text-align: center">
                        Order product details
                    </div>
                    <div class="mb-5"></div>
                    <div class="form-group text-center">
                        <label for="phone" class="label-limited">Phone</label>
                        <input type="text" name="phone" class="form-control" id="" value="<?=$tel?>">
                    </div>
                    <div class="form-group text-center">
                        <label for="email" class="label-limited">Email</label>
                        <input type="email" name="email" class="form-control" id="" value="<?=$email?>">
                    </div>
                    <div class="form-group text-center">
                        <label for="address" class="label-limited">Address</label>
                        <input type="text" name="address" class="form-control" id="" value="<?=$address?>">
                    </div>
                </div><!-- End col-lg-6-->
                <div class="col-lg-3">
                    <button type="submit" class="btn btn-outline-info">Update</button>
                </div>

                <div class="col-lg-3">
                    <a href="index.php?act=account" class="btn btn-outline-primary-2">List account</a>
                </div>

            </form><!-- End form .row-->
        </div> <!-- End .container-->
    </div>
</main>
