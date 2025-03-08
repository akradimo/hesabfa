@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">لیست حساب‌ها</div>

                    <div class="card-body">
                        <a href="{{ route('accounts.create') }}" class="btn btn-primary mb-3">ایجاد حساب جدید</a>

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
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
@endsection