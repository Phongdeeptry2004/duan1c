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
                                    <th class="border-top-0">User</th>
                                    <th class="border-top-0">Pass</th>
                                    <th class="border-top-0">Email</th>
                                    <th class="border-top-0">Họ Tên</th>
                                    <th class="border-top-0">Số Điện Thoại</th>
                                    <th class="border-top-0">Ngày tạo</th>
                                    <th class="border-top-0">Vai Trò</th>
                                    <th class="border-top-0">Avatar</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (showalltk() as $key) :
                                    $sua = 'index.php?act=fixformtk&id=' . $key['id'];
                                    $xoa = 'index.php?act=xoatk&id=' . $key['id'];
                                ?>
                                    <tr>
                                        <td><?php echo $key['id'] ?></td>
                                        <td><?php echo $key['user']?></td>
                                        <td><input  value="<?php echo $key['pass']?>" type="password" name="pass"  id=""></td>
                                        <td><?php echo $key['email'] ?></td>
                                        <td><?php echo $key['hoten'] ?></td>
                                        <td><?php echo $key['phone'] ?></td>
                                        <td><?php echo $key['ngaytao'] ?></td>
                                        <td><?php echo $key['vaitro'] ?></td>
                                        <td><img src="<?php echo $key['avatar'] ?>" width="100%" alt=""></td>
                                        <td>
                                            <a href='<?php echo $sua ?>'><input class='btn btn-primary' type="submit" value="Sửa"></a>
                                            <a href="<?php echo $xoa ?>"><input class='btn btn-primary' type="submit" value="Xoá"></a>
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
    <a href="index.php?act=formaddtk"><input type="submit" class="btn btn-primary" value="Thêm"></a>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->