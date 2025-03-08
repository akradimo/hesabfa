<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:20|unique:accounts,code,' . $this->account,
            'type' => 'required|in:asset,liability,equity,income,expense',
            'description' => 'nullable|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'نام حساب الزامی است.',
            'code.required' => 'کد حساب الزامی است.',
            'code.unique' => 'این کد حساب قبلا ثبت شده است.',
            'type.required' => 'نوع حساب الزامی است.',
            'type.in' => 'نوع حساب نامعتبر است.',
        ];
    }
}