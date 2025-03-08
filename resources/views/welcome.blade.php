<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>حسابفا - برنامه حسابداری آنلاین</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
        }

        .jumbotron {
            background-image: url('{{ asset('images/header-bg.jpg') }}');
            background-size: cover;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1 class="display-4">حسابفا</h1>
            <p class="lead">برنامه حسابداری آنلاین برای مدیریت آسان امور مالی</p>
            <hr class="my-4">
            <p>با حسابفا، به راحتی حساب‌های خود را مدیریت کنید و گزارش‌های دقیقی از وضعیت مالی خود دریافت کنید.</p>
            <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">ثبت نام رایگان</a>
            <a class="btn btn-success btn-lg" href="{{ route('login') }}" role="button">ورود</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>