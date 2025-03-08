<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>افزودن حساب جدید</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="direction: rtl; text-align: right;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        افزودن حساب جدید
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('accounts.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">نام:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="code">کد:</label>
                                <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}">
                            </div>
                            <div class="form-group">
                                <label for="type">نوع:</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="asset">دارایی</option>
                                    <option value="liability">بدهی</option>
                                    <option value="equity">سرمایه</option>
                                    <option value="income">درآمد</option>
                                    <option value="expense">هزینه</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">توضیحات:</label>
                                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">ذخیره</button>
                            <a href="{{ route('accounts.index') }}" class="btn btn-secondary">انصراف</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>