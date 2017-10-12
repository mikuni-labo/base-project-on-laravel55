<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Users\CreateRequest;
use App\Http\Resources\User\UserResource;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class CreateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('scopes:user-create');
    }

    /**
     * Create the user.
     *
     * @method POST
     * @param  Request $request
     * @param  CreateRequest $validator
     * @param  User $user
     * @return mixed
     */
    public function __invoke(Request $request, CreateRequest $validator, User $user)
    {
        $this->authorize('create', $user);

        $request->validate($validator->rules(), $validator->messages(), $validator->attributes());

        $inputs = $request->only('name', 'email', 'password', 'role');
        $inputs['password'] = bcrypt($request->password);

        return (new UserResource(User::create($inputs)))
            ->response()
            ->setStatusCode(201);
    }

}
