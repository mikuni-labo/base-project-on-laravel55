<?php

namespace App\Http\Requests\Api\Users;

class UsersRequest
{
    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name'                  => '氏名',
            'email'                 => 'メールアドレス',
            'password'              => 'パスワード',
            'password_confirmation' => 'パスワード(確認)',
        ];
    }

}
