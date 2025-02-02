<div class="wrap hesabfa-container">
    <h1>افزودن خدمت جدید</h1>
    <form method="post" action="">
        <?php wp_nonce_field('hesabfa_add_service', 'hesabfa_add_service_nonce'); ?>
        <table class="form-table">
            <tr>
                <th scope="row"><label for="name">نام خدمت</label></th>
                <td><input name="name" type="text" id="name" class="regular-text" required></td>
            </tr>
            <tr>
                <th scope="row"><label for="code">کد خدمت</label></th>
                <td><input name="code" type="text" id="code" class="regular-text" required></td>
            </tr>
            <tr>
                <th scope="row"><label for="price">قیمت</label></th>
                <td><input name="price" type="number" id="price" step="0.01" required></td>
            </tr>
            <tr>
                <th scope="row"><label for="description">توضیحات</label></th>
                <td><textarea name="description" id="description" class="regular-text"></textarea></td>
            </tr>
        </table>
        <?php submit_button('افزودن خدمت'); ?>
    </form>
</div>