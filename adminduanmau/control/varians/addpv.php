<div class="container-fluid">
    <form method="post" action="index.php?act=addpv">
        <h1>Biến Thể</h1>

        <div class="mb-3">
            <div class="form-group">
                <label for="id_product">Sản phẩm:</label>
                <select name="id_product" id='id_product' class="form-control">
                    <?php foreach (showallsp() as $key) : ?>
                        <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <div class="form-group">
                <label for="id_color">Màu Sắc:</label>
                <select name="id_color" id='id_color' class="form-control">
                    <?php foreach (showallcolor() as $key) : ?>
                        <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <div class="form-group">
                <label for="size">Kích Thước:</label>
                <select name="id_size" id='id_size' class="form-control">
                    <?php foreach (showallsize() as $key) : ?>
                        <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <div class="form-group">
                <label for="quantity">Số Lượng</label>
                <input type="number" class="form-control" name="quantity" id="quantity">
            </div>
        </div>
        <div class="mb-3">
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="number"class="form-control" name="price" id="price">
            </div>
        </div>
        <button type="submit" name='submit' class="btn btn-primary">Thêm</button>
    </form>

</div>