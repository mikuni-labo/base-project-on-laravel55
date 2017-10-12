<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Users\UpdateRequest;
use App\Http\Resources\User\UserResource;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class UpdateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('scopes:user-update');
    }

    /**
     * Update the user.
     *
     * @method PUT
     * @param  Request $request
     * @param  UpdateRequest $validator
     * @param  User $user
     * @return mixed
     */
    public function __invoke(Request $request, UpdateRequest $validator, User $user)
    {
        $this->authorize('update', $user);

        $request->validate($validator->rules($user), $validator->messages(), $validator->attributes());

        $inputs = $request->only('name', 'email', 'password', 'role');

        if (!empty($request->password)) {
            $inputs['password'] = bcrypt($request->password);
        }

        $user->update($inputs);

        return response('', 204);
    }

}
