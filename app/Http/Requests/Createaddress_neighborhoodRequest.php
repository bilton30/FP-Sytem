<?php

namespace App\Http\Requests;

use App\Models\address_neighborhood;
use Illuminate\Foundation\Http\FormRequest;

class Createaddress_neighborhoodRequest extends FormRequest
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
        return address_neighborhood::$rules;
    }
}
