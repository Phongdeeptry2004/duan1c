<div class="container-fluid">
    <form action="index.php?act=adddh" method="post">
        <div class="mb-3">
            <label for="id_user" class="form-label">id User</label>
            <input type="text" class="form-control" id="id_user" name="id_user">
        </div>
        <div class="mb-3">
            <label for="ngaydathang" class="form-label">Ngày Đặt Hàng</label>
            <input type="date" class="form-control" id="ngaydathang" name="ngaydathang">
        </div>
        <div class="mb-3">
            <label for="ngaygiaohang" class="form-label">Ngày Giao Hàng</label>
            <input type="date" class="form-control" id="ngaygiaohang" name="ngaygiaohang">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Tên người nhận</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="mb-3">
            <label for="pay" class="form-label">Hình thức thanh toán</label>
            <select class="form-control" id="pay" name="pay">
                <option value="tiền mặt">Tiền mặt</option>
                <option value="chuyển khoản">Chuyển khoản</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tong" class="form-label">Tổng tiền</label>
            <input type="number" class="form-control" id="tong" name="tong" >
        </div>

        <button type="submit" name='submit' class="btn btn-primary">Thêm</button>
    </form>
</div>