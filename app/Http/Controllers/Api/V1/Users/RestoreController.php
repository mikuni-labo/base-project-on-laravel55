<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class RestoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('scopes:user-restore');
    }

    /**
     * Restore the user.
     *
     * @method PATCH
     * @param  Request $request
     * @param  User $user
     * @param  int $id
     * @return mixed
     */
    public function __invoke(Request $request, User $user, int $id)
    {
        $user = $user->onlyTrashed()->findOrFail($id);

        $this->authorize('restore', $user);

        $user->restore();

        return response('', 204);
    }

}
