<div class="wrap hesabfa-container">
    <h1>افزودن فاکتور جدید</h1>
    <form method="post" action="">
        <?php wp_nonce_field('hesabfa_add_invoice', 'hesabfa_add_invoice_nonce'); ?>
        <table class="form-table">
            <tr>
                <th scope="row"><label for="customer_name">نام مشتری</label></th>
                <td><input name="customer_name" type="text" id="customer_name" class="regular-text" required></td>
            </tr>
            <tr>
                <th scope="row"><label for="total_amount">مبلغ کل</label></th>
                <td><input name="total_amount" type="number" id="total_amount" step="0.01" required></td>
            </tr>
        </table>
        <?php submit_button('افزودن فاکتور'); ?>
    </form>
</div>