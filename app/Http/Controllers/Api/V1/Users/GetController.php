<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class GetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('scopes:user-get');
    }

    /**
     * Get the user.
     *
     * @method GET
     * @param  Request $request
     * @param  User $user
     * @return Resource
     */
    public function __invoke(Request $request, User $user): Resource
    {
        $this->authorize('get', $user);

        return new UserResource($user);
    }

}
