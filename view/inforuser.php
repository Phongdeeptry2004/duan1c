<section>
    <?php
    if ($_SESSION['user']) {
        $id = $_SESSION['user']['id'];
        $tk = showonetk($id);
        // print_r($tk);
    }
    ?>
    <div class="container py-5">
        <form action="index.php?act=updateinfor" enctype="multipart/form-data" method="post">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="<?php
                                        if ($tk[0]['avatar'] == '') {
                                            echo 'view/img/avatardefaul.png';
                                        } else echo $tk[0]['avatar'];
                                        ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <input type="file" hidden id="img" name="img"  >
                            <h5 class="my-3"><?php echo $tk[0]['user'] ?></h5>
                            <p class="text-muted mb-4"><?php echo $tk[0]['vaitro'] ?></p>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-outline-primary ms-1" onclick="enableInputs()">Chỉnh sửa thông tin</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Họ tên đầy đủ</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" disabled class="text-muted mb-0 form-control" name='hoten' value="<?php echo $tk[0]['hoten'] ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="email" disabled value="<?php echo $tk[0]['email'] ?>" name='email' class="text-muted mb-0 form-control">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Số điện thoại</p>
                                </div>
                                <div class="col-sm-9">
                                    <input name='phone' value="<?php echo $tk[0]['phone'] ?>" disabled name='phone' class="text-muted mb-0 form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                <button type="submit" hidden  name="submit" class="btn btn-outline-primary ms-1">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script>
function enableInputs() {
    document.querySelectorAll('input[disabled]').forEach(input => {
        input.disabled = false;
    });

    document.querySelector('button[name="submit"]').hidden = false;
    document.querySelector('input[name="img"]').hidden = false;

}
</script>