<div class="wrap hesabfa-container">
    <h1>لیست فاکتورها</h1>
    <a href="<?php echo admin_url('admin.php?page=hesabfa-invoices&action=add'); ?>" class="btn btn-primary mb-3">افزودن فاکتور جدید</a>
    <table class="table table-bordered">
        <thead class="table-dark">
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
                    <a href="<?php echo admin_url('admin.php?page=hesabfa-invoices&action=edit&id=' . $invoice->id); ?>" class="btn btn-sm btn-warning">ویرایش</a>
                    <a href="<?php echo wp_nonce_url(admin_url('admin.php?page=hesabfa-invoices&action=delete&id=' . $invoice->id), 'hesabfa_delete_invoice_' . $invoice->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('آیا مطمئن هستید؟');">حذف</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>