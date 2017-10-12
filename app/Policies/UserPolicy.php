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
    public function before(User $myself, string $ability): ?bool
    {
        if ($myself->isMaster() && $ability !== 'delete') {
            return true;
        }

        return null;
    }

    /**
     * Determine whether the user can get index of users.
     *
     * @param  User  $myself
     * @return bool
     */
    public function index(User $myself): bool
    {
        if ($myself->isCompanyAdmin() || $myself->isStoreAdmin()) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can get the user.
     *
     * @param  User  $myself
     * @param  User  $user
     * @return bool
     */
    public function get(User $myself, User $user): bool
    {
        if ($myself->isCompanyAdmin()) {
//             return // TODO 同一企業IDのみ;
        } elseif ($myself->isStoreAdmin()) {
//             return // TODO 同一店舗IDのみ;
        }

        return $myself->id === $user->id;
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  User $myself
     * @return bool
     */
    public function create(User $myself): bool
    {
        return ! $myself->isStoreUser();
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  User  $myself
     * @param  User  $user
     * @return bool
     */
    public function update(User $myself, User $user): bool
    {
        if ($myself->isCompanyAdmin()) {
//             return // TODO 同一企業IDのみ;
        } elseif ($myself->isStoreAdmin()) {
//             return // TODO 同一店舗IDのみ;
        }

        return $myself->id === $user->id;
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  User  $myself
     * @param  User  $user
     * @return bool
     */
    public function delete(User $myself, User $user): bool
    {
        if ($myself->isCompanyAdmin()) {
//             return // TODO 同一企業IDのみ;
        } elseif ($myself->isStoreAdmin()) {
//             return // TODO 同一店舗IDのみ;
        } elseif ($myself->isStoreUser()) {
            return false;
        }

        return $myself->id !== $user->id;
    }

    /**
     * Determine whether the user can restore the user.
     *
     * @param  User  $myself
     * @param  User  $user
     * @return bool
     */
    public function restore(User $myself, User $user): bool
    {
        if ($myself->isCompanyAdmin()) {
            //             return // TODO 同一企業IDのみ;
        } elseif ($myself->isStoreAdmin()) {
            //             return // TODO 同一店舗IDのみ;
        } elseif ($myself->isStoreUser()) {
            return false;
        }

        return $myself->id !== $user->id;
    }

}
