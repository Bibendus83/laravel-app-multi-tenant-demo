<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Checkout;
use Illuminate\Auth\Access\HandlesAuthorization;

class CheckoutPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        //
    }

    /**
     * Determine whether the user can view any checkouts.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the checkout.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Checkout  $checkout
     * @return mixed
     */
    public function view(User $user, Checkout $checkout)
    {
        //
    }

    /**
     * Determine whether the user can create checkouts.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $requiredFields = array(
            'name',
            'email',
        );
        foreach ($requiredFields AS $field) {
            if (!$user->{$field}) {
                return false;
            }
        }
        return true;
    }

    /**
     * Determine whether the user can update the checkout.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Checkout  $checkout
     * @return mixed
     */
    public function update(User $user, Checkout $checkout)
    {
        //
    }

    /**
     * Determine whether the user can delete the checkout.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Checkout  $checkout
     * @return mixed
     */
    public function delete(User $user, Checkout $checkout)
    {
        //
    }

    /**
     * Determine whether the user can restore the checkout.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Checkout  $checkout
     * @return mixed
     */
    public function restore(User $user, Checkout $checkout)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the checkout.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Checkout  $checkout
     * @return mixed
     */
    public function forceDelete(User $user, Checkout $checkout)
    {
        //
    }
}
