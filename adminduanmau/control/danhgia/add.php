<div class="container-fluid">
<form action="index.php?act=adddg" method="post">
          <div class="form-group">
            <label for="id_user">id user</label>
            <input type="number" class="form-control" id="id_user" name="id_user" required>
          </div>
          <div class="form-group">
            <label for="id_product">id_product</label>
            <input type="number" class="form-control" id="id_product" name="id_product" required>
          </div>
          <div class="form-group">
            <label for="star">Sao</label>
            <input type="number" step="1" max="5" min="1" class="form-control" id="star" name="star" required>
          </div>
          <div class="form-group">
            <label for="noidung">Nội Dung</label>
            <input type="text" class="form-control" id="noidung" name="noidung" required>
          </div>
          <button type="submit" name='submit' class="btn btn-primary">Thêm</button>
        </form>
</div>