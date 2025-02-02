<div class="wrap hesabfa-container">
    <h1>لیست محصولات</h1>
    <a href="<?php echo admin_url('admin.php?page=hesabfa-products&action=add'); ?>" class="button button-primary">افزودن محصول جدید</a>
    <table class="hesabfa-table">
        <thead>
        <tr>
            <th>نام محصول</th>
            <th>کد محصول</th>
            <th>قیمت</th>
            <th>موجودی</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo esc_html($product->name); ?></td>
                <td><?php echo esc_html($product->code); ?></td>
                <td><?php echo number_format($product->price, 2); ?></td>
                <td><?php echo esc_html($product->stock); ?></td>
                <td>
                    <a href="<?php echo admin_url('admin.php?page=hesabfa-products&action=edit&id=' . $product->id); ?>" class="button">ویرایش1</a>
                    <a href="<?php echo wp_nonce_url(admin_url('admin.php?page=hesabfa-products&action=delete&id=' . $product->id), 'hesabfa_delete_product_' . $product->id); ?>" class="button button-danger" onclick="return confirm('آیا مطمئن هستید؟');">حذف</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>