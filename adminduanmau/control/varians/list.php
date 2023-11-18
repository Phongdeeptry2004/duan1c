<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Size Table</h4>
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Size</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach(showallsize() as $key):
                                                $sua='index.php?act=suasize&id='.$key['id'];
                                                $xoa='index.php?act=xoasize&id='.$key['id'];
                                            ?>
                                            <tr>
                                                <td><?php echo $key['id']?></td>
                                                <td><?php echo $key['name']?></td>
                                                <td>
                                                <a href='<?php echo $sua?>'><input class='btn btn-primary' type="submit" value="Sửa"></a>
                                                <a href="<?php echo $xoa?>"><input class='btn btn-primary' type="submit" value="Xoá"></a>
                                                </td>
                                            </tr>
                                          <?php endforeach?>
                                        </tbody>
                                    </table>
                                </div>
                                <h4 class="card-title">color Table</h4>
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">color</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach(showallcolor() as $key):
                                                $sua='index.php?act=suacolor&id='.$key['id'];
                                                $xoa='index.php?act=xoacolor&id='.$key['id'];
                                            ?>
                                            <tr>
                                                <td><?php echo $key['id']?></td>
                                                <td><?php echo $key['name']?></td>
                                                <td>
                                                    <a href='<?php echo $sua?>'><input class='btn btn-primary' type="submit" value="Sửa"></a>
                                                    <a href="<?php echo $xoa?>"><input class='btn btn-primary' type="submit" value="Xoá"></a>
                                                 </td>
                                            </tr>
                                          <?php endforeach?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <a href="index.php?act=formaddva"><input type="submit" class="btn btn-primary" value="Thêm"></a>
                            <a href="index.php?act=formaddpv" style="margin-top: 10px;"><input type="submit" class="btn btn-primary" value="Thêm Biến Thể Sản Phẩm"></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->