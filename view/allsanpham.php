    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
        <div class="col-lg-3 col-md-12">
            <form action="index.php?act=allsanpham" method="POST">
                <!-- Shop Sidebar Start -->
               
                    <!-- Price Start -->
                    <div class="border-bottom mb-4 pb-4">
                        <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" value="" checked id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                            <span class="badge border font-weight-normal"><?php echo countsp1('')[0][0] ?></span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" value="0" name='price' id="price-1">
                            <label class="custom-control-label" for="price-1">$0 - $100</label>
                            <span class="badge border font-weight-normal"><?php echo countsp1(0)[0][0] ?></span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" value="100" name='price' id="price-2">
                            <label class="custom-control-label" for="price-2">$100 - $200</label>
                            <span class="badge border font-weight-normal"><?php echo countsp1(100)[0][0] ?></span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" value="200" name='price' id="price-3">
                            <label class="custom-control-label" for="price-3">$200 - $300</label>
                            <span class="badge border font-weight-normal"><?php echo countsp1(200)[0][0]  ?></span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" value="300" name='price' id="price-4">
                            <label class="custom-control-label" for="price-4">$300 - $400</label>
                            <span class="badge border font-weight-normal"><?php echo countsp1(300)[0][0] ?></span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" value="400" name='price' id="price-5">
                            <label class="custom-control-label" for="price-5">$400 - $500</label>
                            <span class="badge border font-weight-normal"><?php echo countsp1(400)[0][0] ?></span>
                        </div>
                    </div>
                    <!-- Price End -->
                <!-- Shop Sidebar End -->
                <button type='submit' class="btn btn-primary px-3">Lọc</button>
            </form>
            </div>

            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="index.php?act=allsanpham" method="POST">
                                <div class="input-group">
                                    <input type="text" class="form-control" name='kyw' placeholder="Search by name">
                                    <div class="input-group-append">
                                        <button type="submit" name='submit' class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort by
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="index.php?act=allsanpham&sx=moinhat">Mới Nhất</a>
                                    <a class="dropdown-item" href="index.php?act=allsanpham&sx=giathap">Giá Thấp</a>
                                    <a class="dropdown-item" href="index.php?act=allsanpham&sx=giacao">Giá Cao</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_GET["page"]) && $_GET["page"] != "") {
                        $page = $_GET["page"];
                    } else $page = 1;
                    foreach (showspbypage($page, $kyw,$range,$sx) as $key) : ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid w-100" src="<?php echo $key['img'] ?>" alt="">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3"><?php echo $key['name'] ?></h6>
                                    <div class="d-flex justify-content-center">
                                        <h6><?php echo $key['price'] ?></h6>
                                        <h6 class="text-muted ml-2"><del><?php echo $key['price'] ?></del></h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="index.php?act=sanphamct&id=<?php echo $key['id'] ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                    <a href="index.php?act=checksptocart&id=<?php echo $key['id'] ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center mb-3">
                                <li class="page-item "><a class="page-link" href="index.php?act=allsanpham&page=1">1</a></li>
                                <?php $number = pagenumbers()[0][0] / 12;
                                $page = ceil($number);
                                for ($i = 2; $i <= $page; $i++) :  ?>
                                    <li class="page-item"><a class="page-link" href="index.php?act=allsanpham&page=<?php echo $i ?>"><?php echo $i ?></a></li>
                                <?php endfor ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <script>
        const currentPage = window.location.href.match(/page=(\d+)/)[1];
        const pageLinks = document.querySelectorAll('.pagination .page-item');
        for (const pageLink of pageLinks) {
            if (pageLink.querySelector('a').href.includes(`page=${currentPage}`)) {
                pageLink.classList.add('active');
                break;
            }
        }
    </script>
    <!-- Shop End -->