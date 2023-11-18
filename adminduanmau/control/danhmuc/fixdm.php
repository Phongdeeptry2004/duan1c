<div class="container-fluid">
    <?php 
    if(isset($_GET["id"]) && $_GET["id"] ){
        $id = $_GET["id"];
        $dm=showonedm($id);
    }
    ?>
<form action="index.php?act=updatedm" method="POST">
    <input type="hidden" name="id" value='<?php echo $dm[0]['id']?>'>
        <div class="mb-3">
            <label for="tendanhmuc" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" value="<?php echo $dm[0]['name']?>" id="tendanhmuc" name="tendanhmuc">
        </div>
        <div class="mb-3">
            <label for="ngaytao" class="form-label">Ngày tạo </label>
            <input type="date" class="form-control" value="<?php echo $dm[0]['ngaytao']?>" id="ngaytao" name="ngaytao">
        </div>
        <div class="mb-3">
            <label for="mota" class="form-label">Mô tả</label>
            <textarea class="form-control" id="mota" name="mota" rows="3"><?php echo $dm[0]['motadanhmuc']?></textarea>
        </div>

        <button type="submit" name='submit' class="btn btn-primary">Thêm</button>
    </form>
</div>