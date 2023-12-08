<?php

namespace App\Http\Requests;

use App\Models\version_db;
use Illuminate\Foundation\Http\FormRequest;

class Createversion_dbRequest extends FormRequest
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
        return version_db::$rules;
    }
}
