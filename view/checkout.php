    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Checkout Start -->
    <?php 
    $tk=showonetk($_SESSION["user"]["id"]);
    
    ?>
    <div class="container-fluid pt-5">
        <form action="index.php?act=checkout" method="POST">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label>Họ Tên</label>
                            <input class="form-control" name='hoten' type="text" value="<?php echo $tk[0]['hoten']?>" placeholder="Mời Nhập" >
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" name='email' value="<?php echo $tk[0]['email']?>" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" name='phone' type="text" value="<?php echo $tk[0]['phone']?>" placeholder="+123 456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Thành Phố</label>
                            <input class="form-control" name='thanhpho' type="text" required placeholder="Mời nhập">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Huyện</label>
                            <input class="form-control" name='huyen' type="text " required placeholder="Mời nhập">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Địa Chỉ</label>
                            <input class="form-control" name='sonha' type="text" required  placeholder="Mời nhập">
                        </div>
                    </div>
                </div>
            </div>
            <?php
                $id = $_SESSION["user"]['id'];
                $total = 0;
                foreach (showcart($id) as $key) :
                    $productPrice = $key['price'] * $key['quantity'];
                    $total += $productPrice;
                endforeach;
                ?>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                   
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        <?php 
                        foreach (showcart($id) as $key) :
                        ?>
                        
                        <div class="d-flex justify-content-between">
                            <p><?php echo $key['name']?></p>
                            <p><?php echo $key['price'] * $key['quantity'];?></p>
                        </div>
                            <?php endforeach?>
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium"><?php echo $total?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold"><?php echo $total+10?></h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" value="Thanh toán online" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Thanh toán online</label>
                            </div>
                        </div>
                        <input type="hidden" name='total' value="<?php echo $total?>">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input"  value="Thanh toán bằng thẻ visa" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Thanh toán bằng thẻ visa</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" value="Thanh toán khi nhận hàng" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Thanh toán khi nhận hàng</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button type="submit" name='submit' class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- Checkout End -->