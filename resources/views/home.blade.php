<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>حسابفا - صفحه اصلی</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
            direction: rtl;
            text-align: right;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .links > a {
            padding: 0 25px;
            font-size: 1.2rem;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            color: #3490dc;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">
            به حسابفا خوش آمدید!
        </div>
        <div class="links">
            <a href="{{ route('accounts.index') }}">مدیریت حساب‌ها</a>
            <a href="{{ route('customers.index') }}">مدیریت مشتریان</a>
            <!-- Add more links here -->
        </div>
    </div>
</div>
</body>
</html>