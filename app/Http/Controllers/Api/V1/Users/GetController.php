<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\{JsonResponse,Request};

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
     * @param  Request $request
     * @param  User $user
     * @return JsonResponse
     */
    public function __invoke(Request $request, User $user): JsonResponse
    {
        $this->authorize('get', $user);

        return $request->user();
    }

}
