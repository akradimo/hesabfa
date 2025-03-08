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

        .sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            background-color: #f8f9fa;
            padding: 20px;
            border-left: 1px solid #dee2e6;
        }

        .content {
            margin-right: 250px;
            padding: 20px;
        }

        .list-unstyled li a {
            display: block;
            padding: 8px 16px;
            text-decoration: none;
            color: #343a40;
        }

        .list-unstyled li a:hover {
            background-color: #e9ecef;
        }

        .dropdown-toggle::after {
            display: inline-block;
            margin-right: 0.255em;
            vertical-align: 0.255em;
            content: "";
            border-top: 0.3em solid;
            border-right: 0.3em solid transparent;
            border-bottom: 0;
            border-left: 0.3em solid transparent;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            @auth
                <nav id="sidebar" class="sidebar">
                    @include('layouts.sidebar')
                </nav>

                <main class="content">
                    @yield('content')
                </main>
            @else
                <main class="content">
                    @yield('content')
                </main>
            @endauth
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.dropdown-toggle').click(function () {
                $('.collapse').collapse('hide');
                $(this).next('.collapse').collapse('toggle');
            });
        });
    </script>
</body>
</html>