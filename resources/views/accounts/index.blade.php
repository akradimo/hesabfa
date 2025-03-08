@extends('layouts.app')

@section('content')
    <h1>لیست حساب‌ها</h1>

    <a href="{{ route('accounts.create') }}" class="btn btn-primary">ایجاد حساب جدید</a>

    <table class="table">
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
                        <a href="{{ route('accounts.show', $account->id) }}" class="btn btn-info">نمایش</a>
                        <a href="{{ route('accounts.edit', $account->id) }}" class="btn btn-warning">ویرایش</a>
                        <form action="{{ route('accounts.destroy', $account->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection