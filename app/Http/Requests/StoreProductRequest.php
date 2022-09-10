<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
       'name' => 'required|string',
       'price' => 'required|max:10',
       'description' =>'required',
       'count' => 'required|max:10',
       'rate' => 'nullable|max:1',
       'discount' => 'nullable|max:2',
       'occasion_id' => 'required',
       'department_id' => 'required',
       ];
    }
}
