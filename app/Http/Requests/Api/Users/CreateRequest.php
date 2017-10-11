<?php

namespace App\Http\Requests\Api\Users;

use App\Rules\UserRole;

class CreateRequest extends UsersRequest
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
            'name'     => 'required|string|max:191',
            'email'    => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6|max:16|confirmed',// TODO passwordは確認用も含むのか検討
            'role'     => [
                new UserRole,
            ],
            /**
             * TODO 権限によって、登録可能な企業ID・店舗IDを振り分ける
             */
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

}
