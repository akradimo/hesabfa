<?php
// functions/functions.php
// توابع کاربردی برنامه

// تابع ثبت تراکنش جدید
function addTransaction($conn, $date, $description, $amount, $type) {
    $date = mysqli_real_escape_string($conn, $date);
    $description = mysqli_real_escape_string($conn, $description);
    $amount = floatval($amount);
    $type = mysqli_real_escape_string($conn, $type);

    $sql = "INSERT INTO transactions (date, description, amount, type) VALUES ('$date', '$description', $amount, '$type')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

// تابع دریافت لیست تراکنش‌ها
function getTransactions($conn) {
    $sql = "SELECT * FROM transactions ORDER BY date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

// تابع فرمت کردن مبلغ
function formatAmount($amount) {
    return number_format($amount, 0, '.', ',') . " ریال";
}

// تابع نمایش نوع تراکنش
function displayTransactionType($type) {
    switch ($type) {
        case 'income':
            return 'درآمد';
        case 'expense':
            return 'هزینه';
        default:
            return 'نامشخص';
    }
}
?>