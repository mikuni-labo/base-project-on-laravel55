<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UsersRequest;
use App\Http\Resources\User\UsersCollection;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('scopes:user-index');
    }

    /**
     * Get the user.
     *
     * @param  Request $request
     * @param  UsersRequest $validator
     * @param  User $user
     * @return ResourceCollection
     */
    public function __invoke(Request $request, UsersRequest $validator, User $user): ResourceCollection
    {
        $this->authorize('index', $user);

        $request->validate($validator->rules(), $validator->messages(), $validator->attributes());

        return new UsersCollection($user->all());
    }

}
