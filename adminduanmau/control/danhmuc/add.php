<div class="container-fluid">
<form action="index.php?act=adddm" method="post">
        <div class="mb-3">
            <label for="tendanhmuc" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="tendanhmuc" name="tendanhmuc">
        </div>
        <div class="mb-3">
            <label for="mota" class="form-label">Mô tả</label>
            <textarea class="form-control" id="mota" name="mota" rows="3"></textarea>
        </div>

        <button type="submit" name='submit' class="btn btn-primary">Thêm</button>
    </form>
</div>