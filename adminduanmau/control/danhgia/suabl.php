
<div class="container-fluid">
  <?php 
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $bl=showonedg($id);
  }
  ?>
<form action="index.php?act=suadg" method="post">
          <input type="hidden" name="id" value="<?php echo $bl[0]['id']?>">
          <div class="form-group">
            <label for="id_user">id user</label>
            <input type="number" class="form-control" id="id_user" value="<?php echo $bl[0]['id_user']?>" name="id_user" required>
          </div>
          <div class="form-group">
            <label for="id_product">id_product</label>
            <input type="number" class="form-control" id="id_product" value="<?php echo $bl[0]['id_product']?>" name="id_product" required>
          </div>
          <div class="form-group">
            <label for="id_product">Sao</label>
            <input type="number" step="1" class="form-control" id="star" value="<?php echo $bl[0]['star']?>" name="star" required>
          </div>
          <div class="form-group">
            <label for="noidung">Nội Dung</label>
            <input type="text" class="form-control" id="noidung" value="<?php echo $bl[0]['noidung']?>" name="noidung" required>
          </div>
          <button type="submit" name='submit' class="btn btn-primary">Sửa</button>
        </form>
</div>