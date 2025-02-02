<div class="wrap hesabfa-container">
    <h1>ویرایش محصول</h1>
    <form method="post" action="">
        <?php wp_nonce_field('hesabfa_edit_product', 'hesabfa_edit_product_nonce'); ?>
        <table class="form-table">
            <tr>
                <th scope="row"><label for="name">نام محصول</label></th>
                <td><input name="name" type="text" id="name" class="regular-text" value="<?php echo esc_attr($product->name); ?>" required></td>
            </tr>
            <tr>
                <th scope="row"><label for="code">کد محصول</label></th>
                <td><input name="code" type="text" id="code" class="regular-text" value="<?php echo esc_attr($product->code); ?>" required></td>
            </tr>
            <tr>
                <th scope="row"><label for="price">قیمت</label></th>
                <td><input name="price" type="number" id="price" step="0.01" value="<?php echo esc_attr($product->price); ?>" required></td>
            </tr>
            <tr>
                <th scope="row"><label for="stock">موجودی</label></th>
                <td><input name="stock" type="number" id="stock" value="<?php echo esc_attr($product->stock); ?>" required></td>
            </tr>
        </table>
        <?php submit_button('ذخیره تغییرات'); ?>
    </form>
</div>