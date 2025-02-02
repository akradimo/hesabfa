<div class="wrap hesabfa-container">
    <h1>افزودن خدمت جدید</h1>
    <form method="post" action="">
        <?php wp_nonce_field('hesabfa_add_service', 'hesabfa_add_service_nonce'); ?>
        <div class="mb-3">
            <label for="name" class="form-label">نام خدمت</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="code" class="form-label">کد خدمت</label>
            <input type="text" class="form-control" id="code" name="code" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">قیمت</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">توضیحات</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">افزودن خدمت</button>
    </form>
</div>