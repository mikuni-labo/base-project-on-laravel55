<?php

namespace App\Policies;

use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Prioritize authorization before policy is actually invoked.
     *
     * @param  User $myself
     * @param  string $ability
     * @return boolean|null
     */
//     public function before(User $myself, string $ability)
//     {
//         if ($myself->isMaster()) {
//             return true;
//         }
//     }

    /**
     * Determine whether the user can get index of users.
     *
     * @param  User  $myself
     * @return mixed
     */
    public function getIndex(User $myself)
    {
        //
    }

    /**
     * Determine whether the user can get the user.
     *
     * @param  User  $myself
     * @param  User  $user
     * @return mixed
     */
    public function get(User $myself, User $user)
    {
        dd($myself->id);
        dd($user->id);
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  User $myself
     * @return mixed
     */
    public function create(User $myself)
    {
        //
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  User  $myself
     * @param  User  $user
     * @return mixed
     */
    public function update(User $myself, User $user)
    {
        //
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  User  $myself
     * @param  User  $user
     * @return mixed
     */
    public function delete(User $myself, User $user)
    {
        //
    }

    /**
     * Determine whether the user can restore the user.
     *
     * @param  User  $myself
     * @param  User  $user
     * @return mixed
     */
    public function restore(User $myself, User $user)
    {
        //
    }

}
