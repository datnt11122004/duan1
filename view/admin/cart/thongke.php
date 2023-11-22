<main class="main text-center" style="width: 78%; margin: 0 auto;">
    <div class="mb-5"></div>
    <div class="box_title " style="font-size: 25px">Thống kê tỉ lệ đơn hàng</div> <br>
    <div class="container mt-3">
        <div class="row form_content">
            <div class="col-8">
                <div class="mb-3 formds_loai">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center col-md-1"></th>
                                <th class="text-center col-md-1">Tổng số đơn hàng</th>
                                <th class="text-center col-md-2">Đơn hàng thành công</th>
                                <th class="text-center col-md-2">Đơn hàng đang được xác nhận</th>
                                <th class="text-center col-md-2">Đơn hàng đang được xử lý</th>
                                <th class="text-center col-md-2">Đơn hàng bị hủy</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($thongkedh as $value){
                                extract($value);

                                echo'<tr>
                                            <td class="text-center col-md-1"></td>
                                            <td class="text-center col-md-1">'.$totalOrders.'</td>
                                            <td class="text-center col-md-2">'.$successfulOrders.'</td>
                                            <td class="text-center col-md-2">'.$newOrders.'</td>
                                            <td class="text-center col-md-2">'.$processingOrders.'</td> 
                                            <td class="text-center col-md-2">'.$deliveringOrders.'</td> 
                                        </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tỉ lệ đơn hàng</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <hr>
                        Styling for the donut chart can be found in the
                        <code>/js/demo/chart-pie-demo.js</code> file.
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>

   var totalOrders = <?=$totalOrders?>;

    var orderData = {
        newOrders: <?=$newOrders?>,
        processingOrders: <?=$processingOrders?>,
        deliveringOrders: <?=$deliveringOrders?>,
        successfulOrders: <?=$successfulOrders?>,
    };

    var percentNewOrders = (orderData.newOrders / totalOrders) * 100;
    var percentProcessingOrders = (orderData.processingOrders / totalOrders) * 100;
    var percentDeliveringOrders = (orderData.deliveringOrders / totalOrders) * 100;
    var percentSuccessfulOrders = (orderData.successfulOrders / totalOrders) * 100;
    console.log(percentNewOrders)
</script>
<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->

<script src="js/demo/chart-pie-demo.js"></script>

