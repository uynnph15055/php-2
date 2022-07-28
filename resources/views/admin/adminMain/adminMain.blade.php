@extends('admin.layout.admin')
@section('title' , 'Trang chính')
@section('main_content')
<style>
    .count {
        color: #000;
        margin-top: 10px;
    }

    .icon-count {
        color: #ccc;
        font-size: 30px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Học viên</div>
                <div class="card-footer d-flex align-items-center justify-content-between" style="align-items: center;">
                    <a class="small  stretched-link" href="danh-sach-hoc-vien">View học viên</a>
                    <i class="fas fa-address-card icon-count"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Hóa đơn</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small  stretched-link" href="thong-tin-hoa-don">View hóa đơn</a>
                    <i class="fas fa-receipt icon-count"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">Nhân viên</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small  stretched-link" href="danh-sach-admin">View nhân viên</a>
                    <i class="fas fa-users-cog icon-count"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Khóa học</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small stretched-link" href="danh-sach-mon?trang=1">View khóa học</a>
                    <i class="fas fa-brush icon-count"></i>
                </div>
            </div>
        </div>
    </div>
    <div id="piechart" style="width: 1050px; height: 500px;background-color: #ccc;"></div>

</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['cate_name', 'number_cate'],
            <?php foreach ($chart as $key) {
                echo "['" . $key->name . "', " . $key->number_cate . "],";
            }  ?>
        ]);

        var options = {
            title: 'Thống kê sản phẩm theo danh mục'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>
@endsection