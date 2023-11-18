<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bảng sản phẩm</h4>
                    <div class="table-responsive">
                        
                        <table class="table user-table no-wrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">id_user</th>
                                    <th class="border-top-0">Ngày đặt hàng</th>
                                    <th class="border-top-0">Ngày giao hàng</th>
                                    <th class="border-top-0">address</th>
                                    <th class="border-top-0">phone</th>
                                    <th class="border-top-0">Họ tên</th>
                                    <th class="border-top-0">pay</th>
                                    <th class="border-top-0">Tổng</th>
                                    <th class="border-top-0">Trạng Thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (showalldh() as $key) :
                                    $sua = 'index.php?act=formfixdh&id=' . $key['id'];
                                    $xoa = 'index.php?act=xoadh&id=' . $key['id'];
                                    $trangthai='index.php?act=trangthaidh&id='. $key['id'];
                                ?>
                                    <tr>
                                        <td><?php echo $key['id'] ?></td>
                                        <td><?php echo $key['id_user'] ?></td>
                                        <td><?php echo $key['ngaydathang'] ?></td>
                                        <td><?php echo $key['ngaygiaohang'] ?></td>
                                        <td><?php echo $key['address'] ?></td>
                                        <td><?php echo $key['phone']?></td>
                                        <td><?php echo $key['hoten'] ?></td>
                                        <td><?php echo $key['pay'] ?></td>
                                        <td><?php echo $key['tong'] ?></td>
                                        <td><?php echo $key['trangthai'] ?></td>
                                        <td>
                                            <a href='<?php echo $sua ?>'><input class='btn btn-primary' type="submit" value="Sửa"></a>
                                            <a href="<?php echo $xoa ?>"><input class='btn btn-primary' type="submit" value="Xoá"></a>
                                            <!-- <a href="<?php echo $trangthai ?>"><input class='btn btn-primary' type="submit" value="Update Trạng Thái"></a> -->
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="index.php?act=formadddh"><input type="submit" class="btn btn-primary" value="Thêm"></a>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->