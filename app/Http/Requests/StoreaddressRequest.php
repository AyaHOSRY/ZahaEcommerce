<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreaddressRequest extends FormRequest
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
        'street1' => 'required|max:225',
        'street2' => 'required|max:225',
        'city'=>'required|max:225',
        'state'=> 'required|max:225',
        'country'=> 'required|max:225',
        'zip_code'=> 'required|max:225',
        ];
    }
}
