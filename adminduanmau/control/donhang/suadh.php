<div class="container-fluid">
    <?php 
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $dh=showonedh($id);
    }
    ?>
<form action="index.php?act=suadh" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value='<?php echo $dh[0]['id']?>'>

    <div class="form-group">
    <label for="hoten">Họ Tên</label>
    <input type="text" class="form-control" value="<?php echo $dh[0]['hoten']?>" id="hoten" name="hoten" required>
  </div>
    <div class="form-group">
    <label for="phone">Số điện thoại</label>
    <input type="text" class="form-control" id="phone" value="<?php echo $dh[0]['phone']?>" name="phone" required>
  </div>
    <div class="form-group">
    <label for="address">Địa chỉ</label>
    <input type="text" class="form-control" id="address" value="<?php echo $dh[0]['address']?>" name="address" required>
  </div>
  <div class="form-group">
    <label for="ngaydathang">Ngày đặt hàng</label>
    <input type="datetime" class="form-control" value="<?php echo $dh[0]['ngaydathang']?>" id="ngaydathang" name="ngaydathang" required>
  </div>
  <div class="form-group">
    <label for="ngaygiaohang">Ngày giao hàng</label>
    <input type="datetime" class="form-control" value="<?php echo $dh[0]['ngaygiaohang']?>" id="ngaygiaohang" name="ngaygiaohang" required>
  </div>
  <div class="form-group">
    <label for="pay">Hình thức thanh toán</label>
    <select class="form-control" id="pay"  name="pay"> 
      <option value="tienmat">Tiền mặt</option>
      <option value="chuyenkhoan">Chuyển khoản</option>
    </select>

  <div class="form-group">
    <label for="trangthai">Trạng Thái Đơn hàng</label>
    <select class="form-control"  id="trangthai"  name="trangthai"> 
      <option value="Đang chuẩn bị hàng">Đang chuẩn bị hàng</option>
      <option value="Đang giao hàng">Đang giao hàng</option>
      <option value="Đã giao hàng">Đã giao hàng</option>
    </select>
  </div>
  <button type="submit" name='submit' class="btn btn-primary">sửa</button>
</form>
</div>