<?php
// public/index.php
// صفحه اصلی برنامه

include '../config/config.php';
include '../functions/functions.php';

// بررسی ارسال فرم
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST["date"];
    $description = $_POST["description"];
    $amount = $_POST["amount"];
    $type = $_POST["type"];

    $result = addTransaction($conn, $date, $description, $amount, $type);

    if ($result === true) {
        echo "<p style='color: green;'>تراکنش با موفقیت ثبت شد.</p>";
    } else {
        echo "<p style='color: red;'>خطا در ثبت تراکنش: " . $result . "</p>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>برنامه حسابداری شخصی</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Tahoma, sans-serif;
            direction: rtl;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>ثبت تراکنش جدید</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    تاریخ: <input type="date" name="date"><br><br>
    توضیحات: <input type="text" name="description"><br><br>
    مبلغ: <input type="number" name="amount"><br><br>
    نوع تراکنش:
    <select name="type">
        <option value="income">درآمد</option>
        <option value="expense">هزینه</option>
    </select><br><br>
    <input type="submit" value="ثبت">
</form>

<hr>

<h2>لیست تراکنش‌ها</h2>

<?php
$transactions = getTransactions($conn);

if ($transactions) {
    echo "<table border='1'>";
    echo "<tr><th>تاریخ</th><th>توضیحات</th><th>مبلغ</th><th>نوع</th></tr>";
    while($row = $transactions->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["date"]. "</td>";
        echo "<td>" . $row["description"]. "</td>";
        echo "<td>" . formatAmount($row["amount"]). "</td>";
        echo "<td>" . displayTransactionType($row["type"]) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>تراکنشی یافت نشد.</p>";
}

$conn->close();
?>

</body>
</html>