<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFarmRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id'        => ['required'],
            'name'           => ['required', 'string', 'max:50'],
            'owner'          => ['required', 'string', 'max:50'],
            'type_livestock' => ['required', 'string',],
            'regional'       => ['required', 'string', 'max:30'],
            'subregional'    => ['required', 'string', 'max:30'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user_id.required' => 'Silahkan memilih TS/PPL',
            'name.required' => 'Silahkan mengisi Nama Farm',
            'owner.required' => 'Silahkan mengisi nama pemilik farm',
            'type_livestock.required' => 'Silahkan memilih jenis ternak',
            'regional.required' => 'Silahkan memilih Regional',
            'subregional.required' => 'Silahkan memilih Subregional',
        ];
    }
}
