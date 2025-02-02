<div class="wrap hesabfa-container">
    <h1>ویرایش خدمت</h1>
    <form method="post" action="">
        <?php wp_nonce_field('hesabfa_edit_service', 'hesabfa_edit_service_nonce'); ?>
        <table class="form-table">
            <tr>
                <th scope="row"><label for="name">نام خدمت</label></th>
                <td><input name="name" type="text" id="name" class="regular-text" value="<?php echo esc_attr($service->name); ?>" required></td>
            </tr>
            <tr>
                <th scope="row"><label for="code">کد خدمت</label></th>
                <td><input name="code" type="text" id="code" class="regular-text" value="<?php echo esc_attr($service->code); ?>" required></td>
            </tr>
            <tr>
                <th scope="row"><label for="price">قیمت</label></th>
                <td><input name="price" type="number" id="price" step="0.01" value="<?php echo esc_attr($service->price); ?>" required></td>
            </tr>
            <tr>
                <th scope="row"><label for="description">توضیحات</label></th>
                <td><textarea name="description" id="description" class="regular-text"><?php echo esc_textarea($service->description); ?></textarea></td>
            </tr>
        </table>
        <?php submit_button('ذخیره تغییرات'); ?>
    </form>
</div>