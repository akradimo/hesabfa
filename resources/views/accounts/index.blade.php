<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>لیست حساب‌ها</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="direction: rtl; text-align: right;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        لیست حساب‌ها
                        <a href="{{ route('accounts.create') }}" class="btn btn-sm btn-primary float-left">افزودن حساب جدید</a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>نام</th>
                                    <th>کد</th>
                                    <th>نوع</th>
                                    <th>توضیحات</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accounts as $account)
                                    <tr>
                                        <td>{{ $account->name }}</td>
                                        <td>{{ $account->code }}</td>
                                        <td>{{ $account->type }}</td>
                                        <td>{{ $account->description }}</td>
                                        <td>
                                            <a href="{{ route('accounts.show', $account->id) }}" class="btn btn-sm btn-info">نمایش</a>
                                            <a href="{{ route('accounts.edit', $account->id) }}" class="btn btn-sm btn-warning">ویرایش</a>
                                            <form action="{{ route('accounts.destroy', $account->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>