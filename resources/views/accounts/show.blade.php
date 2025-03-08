@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">نمایش حساب</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">نام حساب</label>
                            <input type="text" class="form-control" id="name" value="{{ $account->name }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="code">کد حساب</label>
                            <input type="text" class="form-control" id="code" value="{{ $account->code }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="type">نوع حساب</label>
                            <input type="text" class="form-control" id="type" value="{{ $account->type }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="description">توضیحات</label>
                            <textarea class="form-control" id="description" readonly>{{ $account->description }}</textarea>
                        </div>

                        <a href="{{ route('accounts.index') }}" class="btn btn-secondary">بازگشت</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection