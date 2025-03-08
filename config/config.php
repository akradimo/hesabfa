<?php
// config/config.php
// تنظیمات اتصال به پایگاه داده

$servername = "localhost"; // یا 127.0.0.1
$username = "root"; // نام کاربری پایگاه داده
$password = ""; // رمز عبور پایگاه داده
$dbname = "hesabfa"; // نام پایگاه داده

// ایجاد اتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . " (" . $conn->connect_errno . ")");
}

$conn->set_charset("utf8"); // تنظیم کدبندی به utf8 برای پشتیبانی از زبان فارسی
?>