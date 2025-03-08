<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نمایش سند حسابداری</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="direction: rtl; text-align: right;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        نمایش سند حسابداری
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="date">تاریخ:</label>
                            <input type="date" class="form-control" value="{{ $transaction->date }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="description">توضیحات:</label>
                            <textarea class="form-control" readonly>{{ $transaction->description }}</textarea>
                        </div>
                        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">بازگشت</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>