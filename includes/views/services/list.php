<div class="wrap hesabfa-container">
    <h1>لیست خدمات</h1>
    <a href="<?php echo admin_url('admin.php?page=hesabfa-services&action=add'); ?>" class="button button-primary">افزودن خدمت جدید</a>
    <table class="hesabfa-table">
        <thead>
        <tr>
            <th>نام خدمت</th>
            <th>کد خدمت</th>
            <th>قیمت</th>
            <th>توضیحات</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($services as $service) : ?>
            <tr>
                <td><?php echo esc_html($service->name); ?></td>
                <td><?php echo esc_html($service->code); ?></td>
                <td><?php echo number_format($service->price, 2); ?></td>
                <td><?php echo esc_html($service->description); ?></td>
                <td>
                    <a href="<?php echo admin_url('admin.php?page=hesabfa-services&action=edit&id=' . $service->id); ?>" class="button">ویرایش</a>
                    <a href="<?php echo wp_nonce_url(admin_url('admin.php?page=hesabfa-services&action=delete&id=' . $service->id), 'hesabfa_delete_service_' . $service->id); ?>" class="button button-danger" onclick="return confirm('آیا مطمئن هستید؟');">حذف</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>