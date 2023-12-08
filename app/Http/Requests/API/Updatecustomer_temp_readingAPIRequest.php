<?php

namespace App\Http\Requests\API;

use App\Models\customer_temp_reading;
use InfyOm\Generator\Request\APIRequest;

class Updatecustomer_temp_readingAPIRequest extends APIRequest
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
