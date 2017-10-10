<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Controller;
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
     * @param  User $user
     * @return ResourceCollection
     */
    public function __invoke(Request $request, User $user): ResourceCollection
    {
        $this->authorize('index', $user);

        return new UsersCollection($user->all());
    }

}
