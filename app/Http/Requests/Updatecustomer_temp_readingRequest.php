<?php

namespace App\Http\Requests;

use App\Models\customer_temp_reading;
use Illuminate\Foundation\Http\FormRequest;

class Updatecustomer_temp_readingRequest extends FormRequest
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
        $rules = customer_temp_reading::$rules;
        
        return $rules;
    }
}
