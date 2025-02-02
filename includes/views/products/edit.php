<div class="wrap hesabfa-container">
    <h1>افزودن محصول جدید</h1>
    <form method="post" action="">
        <?php wp_nonce_field('hesabfa_add_product', 'hesabfa_add_product_nonce'); ?>
        <table class="form-table">
            <tr>
                <th scope="row"><label for="name">نام محصول</label></th>
                <td><input name="name" type="text" id="name" class="regular-text" required></td>
            </tr>
            <tr>
                <th scope="row"><label for="code">کد محصول</label></th>
                <td><input name="code" type="text" id="code" class="regular-text" required></td>
            </tr>
            <tr>
                <th scope="row"><label for="price">قیمت</label></th>
                <td><input name="price" type="number" id="price" step="0.01" required></td>
            </tr>
            <tr>
                <th scope="row"><label for="stock">موجودی</label></th>
                <td><input name="stock" type="number" id="stock" required></td>
            </tr>
        </table>
        <?php submit_button('افزودن محصول'); ?>
    </form>
</div>