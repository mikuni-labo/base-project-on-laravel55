<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class DeleteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('scopes:user-delete');
    }

    /**
     * Delete the user.
     *
     * @method DELETE
     * @param  Request $request
     * @param  User $user
     * @return mixed
     */
    public function __invoke(Request $request, User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return response('', 204);
    }

}
