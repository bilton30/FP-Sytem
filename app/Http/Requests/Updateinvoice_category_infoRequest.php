<?php

namespace App\Http\Requests;

use App\Models\invoice_category_info;
use Illuminate\Foundation\Http\FormRequest;

class Updateinvoice_category_infoRequest extends FormRequest
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
        $rules = invoice_category_info::$rules;
        
        return $rules;
    }
}
