<div class="wrap hesabfa-container">
    <h1>ویرایش محصول</h1>
    <form method="post" action="">
        <?php wp_nonce_field('hesabfa_edit_product', 'hesabfa_edit_product_nonce'); ?>
        <div class="mb-3">
            <label for="name" class="form-label">نام محصول</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo esc_attr($product->name); ?>" required>
        </div>
        <div class="mb-3">
            <label for="code" class="form-label">کد محصول</label>
            <input type="text" class="form-control" id="code" name="code" value="<?php echo esc_attr($product->code); ?>" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">قیمت</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" value="<?php echo esc_attr($product->price); ?>" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">موجودی</label>
            <input type="number" class="form-control" id="stock" name="stock" value="<?php echo esc_attr($product->stock); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
    </form>
</div>