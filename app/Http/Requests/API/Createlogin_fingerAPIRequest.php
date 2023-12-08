<?php

namespace App\Http\Requests\API;

use App\Models\login_finger;
use InfyOm\Generator\Request\APIRequest;

class Createlogin_fingerAPIRequest extends APIRequest
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
        return login_finger::$rules;
    }
}
