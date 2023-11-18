<div class="container-fluid">
<form action="index.php?act=themsp" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">Tên sản phẩm</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="mota">Mô tả</label>
    <textarea class="form-control" id="mota" name="mota" rows="5"></textarea>
  </div>
  <div class="form-group">
    <label for="price">Giá bán</label>
    <input type="number" class="form-control" id="price" name="price" required>
  </div>
  <div class="form-group">
    <label for="quantity">Số lượng</label>
    <input type="number" class="form-control" id="quantity" name="quantity" required>
  </div>
  <div class="form-group">
    <label for="img">Hình ảnh</label>
    <input type="file" class="form-control-file" id="img" name="img">
  </div>

  <div class="form-group">
    <label for="danhmuc">Danh mục</label>
    <select class="form-control" id="danhmuc" name="danhmuc"> 
      <option value="">Chọn danh mục</option>
      <?php  foreach(showalldanhmuc() as $key):?>
      <option value="<?php echo $key['id']?>"><?php echo $key['name']?></option>
      <?php endforeach;?>
    </select>
  </div>
  <button type="submit" name='submit' class="btn btn-primary">Thêm</button>
</form>
</div>