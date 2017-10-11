<?php

namespace App\Http\Requests\Api;

class UsersRequest
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
            'paginate'     => 'boolean',
            'with_trashed' => 'boolean',
            'page'         => 'integer|digits_between:1,10',
            'offset'       => 'integer|digits_between:1,10',
            'per_page'     => 'integer|digits_between:1,10',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

}
