<main class="main text-center" style="width: 78%; margin: 0 auto;">
    <div class="mb-5"></div>
<<<<<<< HEAD
    <div class="box_title " style="font-size: 25px">DANH SÁCH LOẠI HÀNG HÓA</div> <br>
=======
    <div class="box_title " style="font-size: 25px">Thống kê theo sản phẩm</div> <br>
>>>>>>> 3a8a39381b25008552f5818d28380d4e95b4482d
    <div class="container mt-3">
        <div class="row form_content">
            <div class="col-12">
                <div class="mb-3 formds_loai">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center col-md-1"></th>
                                <th class="text-center col-md-1">Mã sản phẩm</th>
                                <th class="text-center col-md-2">Tên sản phẩm</th>
                                <th class="text-center col-md-2">Lượt xem</th>
                                <th class="text-center col-md-2">Lượt mua</th>
                                <th class="text-center col-md-2">Lượt bình luận</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($thongkesp as $value){
                                extract($value);

                                echo'<tr>
                                            <td class="text-center col-md-1"><input type="checkbox" name="" id=""></td>
                                            <td class="text-center col-md-1">'.$idsp.'</td>
                                            <td class="text-center col-md-2">'.$name.'</td>
                                            <td class="text-center col-md-2 justify-content-cente">'.$luot_xem.'</td>
                                            <td class="text-center col-md-2">'.$luot_mua.'</td>
                                            <td class="text-center col-md-2">'.$luotbinhluan.'</td>
                                        </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Thống kê </h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <canvas id="myBarChart"></canvas>
                        </div>
                        <hr>
                        Styling for the bar chart can be found in the
                        <code>/js/demo/chart-bar-demo.js</code> file.
<<<<<<< HEAD
=======
                        <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                        <hr>
                        Styling for the area chart can be found in the
                        <code>/js/demo/chart-area-demo.js</code> file.

>>>>>>> 3a8a39381b25008552f5818d28380d4e95b4482d
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    var dataFromPHP = <?php echo json_encode(thongke_sanpham()); ?>;
    // console.log(dataFromPHP);
    // console.log(dataFromPHP[0][1])
    var productLabels =dataFromPHP.map(product => `Sản phẩm ${product.idsp}`);
    var viewsData = dataFromPHP.map(product => product.luot_xem);
    var purchasesData = dataFromPHP.map(product => product.luot_mua);
    var reviewData = dataFromPHP.map(product => product.luotbinhluan)
</script>
<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->

<script src="js/demo/chart-bar-demo.js"></script>

<<<<<<< HEAD
=======
<script src="js/demo/chart-area-demo.js"></script>

>>>>>>> 3a8a39381b25008552f5818d28380d4e95b4482d
