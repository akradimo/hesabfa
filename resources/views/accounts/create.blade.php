@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ایجاد حساب جدید</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('accounts.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">نام حساب</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="code">کد حساب</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}" required>
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type">نوع حساب</label>
                                <select class="form-control @error('type') is-invalid @enderror" id="type" name="type" required>
                                    <option value="">انتخاب کنید</option>
                                    <option value="asset" {{ old('type') == 'asset' ? 'selected' : '' }}>دارایی</option>
                                    <option value="liability" {{ old('type') == 'liability' ? 'selected' : '' }}>بدهی</option>
                                    <option value="equity" {{ old('type') == 'equity' ? 'selected' : '' }}>سرمایه</option>
                                    <option value="income" {{ old('type') == 'income' ? 'selected' : '' }}>درآمد</option>
                                    <option value="expense" {{ old('type') == 'expense' ? 'selected' : '' }}>هزینه</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">توضیحات</label>
                                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">ذخیره</button>
                            <a href="{{ route('accounts.index') }}" class="btn btn-secondary">انصراف</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection