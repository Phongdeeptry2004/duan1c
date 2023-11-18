    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                        $id = $_SESSION["user"]['id'];
                        $total = 0;

                        foreach (showcart($id) as $key):
                            $productPrice = $key['price'] * $key['quantity'];
                            $total += $productPrice;
                        ?>
                            <tr>
                                <form action="index.php?act=quantityspincart" method="post">
                                    <td class="align-middle"><img src="<?php echo $key['img'] ?>" alt="" style="width: 50px;"> <?php echo $key['name'] ?></td>
                                    <td class="align-middle"><?php echo $key['price'] ?></td>
                                    <td class="align-middle">
                                        <div class="input-group quantity mx-auto">
                                            <input type="hidden" name="id" value='<?php echo $key['id'] ?>'>
                                            <input type="number" max='<?php echo $key['slsp']?>' name='quantity'  class="form-control form-control-sm bg-secondary text-center" value="<?php echo $key['quantity'] ?>">
                                        </div>
                                    </td>
                                    <td class="align-middle"><?php
                                                                $total = $key['quantity'] * $key['price'];
                                                                echo $key['quantity'] * $key['price'] ?></td>
                                    <td class="align-middle"><a href="index.php?act=xoaspincart&id=<?php echo $key['id'] ?>"><i class=" fa fa-times"></i></a></td>
                                    <td class="align-middle"><a href="index.php?act=quantityspincart&id=<?php echo $key['id'] ?>"><input class="btn" value="Update" type="submit"></i></a></td>
                            </tr>
                            </form>
                        <?php
                        endforeach ?>

                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <?php
                $id = $_SESSION["user"]['id'];
                $total = 0;
                foreach (showcart($id) as $key) :
                    $productPrice = $key['price'] * $key['quantity'];
                    $total += $productPrice;
                endforeach;
                ?>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium"><?php echo  '$' . $total ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold"><?php echo '$' . $total + 10 ?></h5>
                        </div>
                        <a href="index.php?act=formcheckout"><button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->