<?php

?>
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Đơn Hàng Đã Đặt</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Trang Chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Đơn Hàng Đã Đặt</p>
        </div>
    </div>
</div>


<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Ngày Đặt Hàng</th>
                        <th>Ngày Giao Hàng</th>
                        <th>Địa Chỉ</th>
                        <th>Phone</th>
                        <th>Họ Tên</th>
                        <th>Hình Thức Thanh Toán</th>
                        <th>Tổng Tiền</th>
                        <th>Trạng Thái</th>
                        <th>Chi tiết đơn hàng</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php
                    $id = $_SESSION['user']['id'];
                    foreach (showalldhbyid($id) as $key) :
                        $ctdonhang = "index.php?act=ctdonhang&id_dh=" . $key['id'];
                    ?>
                        <tr>
                            <td><?php echo $key['ngaydathang'] ?></td>
                            <td><?php echo $key['ngaygiaohang'] ?></td>
                            <td><?php echo $key['address'] ?></td>
                            <td><?php echo $key['phone'] ?></td>
                            <td><?php echo $key['hoten'] ?></td>
                            <td><?php echo $key['pay'] ?></td>
                            <td><?php echo $key['tong'] ?></td>
                            <td><?php echo $key['trangthai'] ?></td>
                            <td class="align-middle"><a href="<?php echo $ctdonhang?>"><input class="btn btn-sm btn-primary" value="Chi tiết" type="submit"></i></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>