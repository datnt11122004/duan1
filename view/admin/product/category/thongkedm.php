<main class="main text-center" style="width: 78%; margin: 0 auto;">
    <div class="mb-5"></div>
<<<<<<< HEAD
    <div class="box_title " style="font-size: 25px">DANH SÁCH LOẠI HÀNG HÓA</div> <br>
=======

    <div class="box_title " style="font-size: 25px">Thống kê theo danh mục</div> <br>
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
                                <th class="text-center col-md-1">Mã danh mục</th>
                                <th class="text-center col-md-2">Tên danh mục</th>
                                <th class="text-center col-md-2">Số sản phẩm</th>
                                <th class="text-center col-md-2">Giá min</th>
                                <th class="text-center col-md-2">Gía max</th>
                                <th class="text-center col-md-1">Giá trung bình</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($listtk as $value){
                                extract($value);

                                echo'<tr>
                                            <td class="text-center col-md-1"><input type="checkbox" name="" id=""></td>
                                            <td class="text-center col-md-1">'.$madm.'</td>
                                            <td class="text-center col-md-2">'.$tendm.'</td>
                                            <td class="text-center col-md-2 ">'.$countsp.'</td>
                                            <td class="text-center col-md-2">'.$minprice.'</td>
                                            <td class="text-center col-md-2">'.$maxprice.'</td>
                                            <td class="text-center col-md-2">'.floatval($avgprice).'</td>
                                            
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
                        <h6 class="m-0 font-weight-bold text-primary">Số sản phẩm</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <canvas id="myBarChart"></canvas>
                        </div>
                        <hr>
                        Styling for the bar chart can be found in the
                        <code>/js/demo/chart-bar-demo.js</code> file.
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    var dataFromPHP = <?php echo json_encode(thongke()); ?>;
    console.log(dataFromPHP);
    console.log(dataFromPHP[0][1])
</script>
<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->

<script src="js/demo/chart-bar-demo.js"></script>

