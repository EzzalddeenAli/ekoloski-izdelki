<?php

namespace Modules\Billing\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterConfirmRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => ['required'],
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            // 'email.required' => trans('billing::newsletter.email.required'),
        ];
    }

}
