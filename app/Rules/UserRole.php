<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UserRole implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $roles = config('fixture.user_role');

        if (! auth()->user()->isMaster()) {
            unset($roles['master']);

            if (! auth()->user()->isCompanyAdmin()) {
                unset($roles['company-admin']);

                if (! auth()->user()->isStoreAdmin()) {
                    unset($roles['store-admin']);
                }
            }
        }

        return in_array($value, array_keys($roles), true);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.user_role');
    }
}
