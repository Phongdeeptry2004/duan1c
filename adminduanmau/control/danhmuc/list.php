<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Bảng Danh Mục</h4>
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Tên Danh Mục</th>
                                                <th class="border-top-0">Ngày Tạo</th>
                                                <th class="border-top-0">Mô Tả</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach(showalldanhmuc() as $key):
                                                $sua='index.php?act=suadm&id='.$key['id'];
                                                $xoa='index.php?act=xoadm&id='.$key['id'];
                                            ?>
                                            <tr>
                                                <td><?php echo $key['id']?></td>
                                                <td><?php echo $key['name']?></td>
                                                <td><?php echo $key['ngaytao']?></td>
                                                <td><?php echo $key['motadanhmuc']?></td>
                                                <td>
                                                <a href='<?php echo $sua?>'><input class='btn btn-primary' type="submit" value="Sửa"></a>
                                                <a href="<?php echo $xoa?>"><input class='btn btn-primary' type="submit" value="Xoá"></a>
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
                <a href="index.php?act=dmaddform"><input type="submit" class="btn btn-primary" value="Thêm"></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->