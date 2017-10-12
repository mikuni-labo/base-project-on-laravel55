<?php

namespace App\Http\Requests\Api\Users;

use App\Rules\UserRole;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class UpdateRequest extends UsersRequest
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
     * @param  Model $model
     * @return array
     */
    public function rules(Model $model)
    {
        return [
            'name'     => 'required|string|max:191',
            'email'    => [
                'required',
                'string',
                'email',
                'max:191',
                Rule::unique('users')->ignore($model->id),
            ],
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
