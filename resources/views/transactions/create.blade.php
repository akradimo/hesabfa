<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>افزودن سند حسابداری جدید</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="direction: rtl; text-align: right;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        افزودن سند حسابداری جدید
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
                        <form action="{{ route('transactions.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="date">تاریخ:</label>
                                <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}">
                            </div>
                            <div class="form-group">
                                <label for="description">توضیحات:</label>
                                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">ذخیره</button>
                            <a href="{{ route('transactions.index') }}" class="btn btn-secondary">انصراف</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>