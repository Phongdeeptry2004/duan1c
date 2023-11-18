<div class="container">
  <h5 class="title">Chi tiết đơn hàng</h5>
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Sản phẩm</h5>
        </div>
        <div class="card-content">
          <div class="order-details">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th class="col-1"><img src="product-image.jpg" width="20%" alt=""></th>
                  <th class="col-4">Tên sản phẩm</th>
                  <th class="col-2">Số lượng</th>
                  <th class="col-2">Giá</th>
                  <th class="col-3">Tạm tính</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sum = 0;
                $id_dh = $_GET["id_dh"];
                foreach (showchitietdh($id_dh) as $row) :
                  $sp = showonesp($row["id_product"])
                ?>
                  <tr>
                    <td><img src="<?php echo $sp[0]['img'] ?>" width="100%" alt=""></td>
                    <td><?php echo $sp[0]['name'] ?></td>
                    <td><?php echo $row['soluong'] ?></td>
                    <td><?php echo $sp[0]['price'] ?></td>
                    <td><?php echo $row['total'] ?></td>
                  </tr>
                <?php
                  $sum += $row['total'];
                endforeach ?>
              </tbody>
              </tfoot>
            </table>
          </div>
        </div>
        <div class="card-footer">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-6">
      <?php $dh=showonedh($id_dh);?>
      <h3>Thông tin khách hàng</h3>
      <ul class="list-group">
        <li class="list-group-item">Họ tên: <?php echo $dh[0]['hoten'] ?></li>
        <li class="list-group-item">Địa chỉ: <?php echo $dh[0]['address'] ?></li>
        <li class="list-group-item">Điện thoại: <?php echo $dh[0]['phone'] ?></li>
      </ul>
    </div>
    <div class="col-xl-6">
      <h1>Hóa đơn</h1>
      <table class="table no-bordered">
        <thead>
          <tr>
            <th>Tên</th>
            <th>Giá</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Tổng tiền</td>
            <td><?php echo $sum ?> đ</td>
          </tr>
          <tr>
            <td>Phí vận chuyển</td>
            <td>10 đ</td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td>Tổng cộng</td>
            <td><?php echo $sum + 10 ?> đ</td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
  <div class="row">
    
  </div>
</div>
</div>