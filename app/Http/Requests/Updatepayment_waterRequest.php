<?php

namespace App\Http\Requests;

use App\Models\payment_water;
use Illuminate\Foundation\Http\FormRequest;

class Updatepayment_waterRequest extends FormRequest
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
        $rules = payment_water::$rules;
        
        return $rules;
    }
}
