<?php

namespace App\Http\Requests\Dashboard\Coupon;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'code' => 'required|string|max:10|unique:coupons,code,' . $this->route('coupon'),
            'discount_percentage' => 'required|numeric|min:1|max:100',
            'start_date' => 'required|date|after_or_equal:now',
            'end_date' => 'required|date|after:start_date',
            'limiter' => 'required|integer|min:1',
            'status' => 'required|in:0,1',
        ];
    }
}
