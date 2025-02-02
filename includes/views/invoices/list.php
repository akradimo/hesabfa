<div class="wrap hesabfa-container">
    <h1>لیست فاکتورها</h1>
    <a href="<?php echo admin_url('admin.php?page=hesabfa-invoices&action=add'); ?>" class="button button-primary">افزودن فاکتور جدید</a>
    <table class="hesabfa-table">
        <thead>
        <tr>
            <th>نام مشتری</th>
            <th>مبلغ کل</th>
            <th>تاریخ ایجاد</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($invoices as $invoice) : ?>
            <tr>
                <td><?php echo esc_html($invoice->customer_name); ?></td>
                <td><?php echo number_format($invoice->total_amount, 2); ?></td>
                <td><?php echo esc_html($invoice->created_at); ?></td>
                <td>
                    <a href="<?php echo admin_url('admin.php?page=hesabfa-invoices&action=edit&id=' . $invoice->id); ?>" class="button">ویرایش</a>
                    <a href="<?php echo wp_nonce_url(admin_url('admin.php?page=hesabfa-invoices&action=delete&id=' . $invoice->id), 'hesabfa_delete_invoice_' . $invoice->id); ?>" class="button button-danger" onclick="return confirm('آیا مطمئن هستید؟');">حذف</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>