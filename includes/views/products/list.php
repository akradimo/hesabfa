<table class="wp-list-table widefat fixed striped">
    <thead>
    <tr>
        <th>کد کالا</th>
        <th>گروه</th>
        <th>زیر گروه</th>
        <th>نام کالا</th>
        <th>سریال</th>
        <th>بارکرد</th>
        <th>بارکد دوم</th>
        <th>واحد</th>
        <th>شناسه مالیاتی</th>
        <th>موجودی اولیه</th>
        <th>قیمت خرید</th>
        <th>قیمت خرید فروشگاه</th>
        <th>تخفیف خرید</th>
        <th>قیمت فروش</th>
        <th>قیمت فروش فروشگاه</th>
        <th>تخفیف فروش</th>
        <th>درصد مالیاتی</th>
        <th>توضیحات</th>
        <th>عملیات</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo esc_html($product->code); ?></td>
            <td><?php echo esc_html($product->group); ?></td>
            <td><?php echo esc_html($product->sub_group); ?></td>
            <td><?php echo esc_html($product->name); ?></td>
            <td><?php echo esc_html($product->serial); ?></td>
            <td><?php echo esc_html($product->barcode1); ?></td>
            <td><?php echo esc_html($product->barcode2); ?></td>
            <td><?php echo esc_html($product->unit); ?></td>
            <td><?php echo esc_html($product->tax_id); ?></td>
            <td><?php echo esc_html($product->initial_stock); ?></td>
            <td><?php echo esc_html($product->purchase_price); ?></td>
            <td><?php echo esc_html($product->store_purchase_price); ?></td>
            <td><?php echo esc_html($product->purchase_discount); ?></td>
            <td><?php echo esc_html($product->sale_price); ?></td>
            <td><?php echo esc_html($product->store_sale_price); ?></td>
            <td><?php echo esc_html($product->sale_discount); ?></td>
            <td><?php echo esc_html($product->tax_percentage); ?></td>
            <td><?php echo esc_html($product->description); ?></td>
            <td>
                <a href="?page=edit-product&id=<?php echo $product->id; ?>">ویرایش</a>
                <a href="?page=delete-product&id=<?php echo $product->id; ?>">حذف</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>