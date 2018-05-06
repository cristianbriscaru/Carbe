<?php

namespace App\Policies;

use App\User;
use App\Seller;
use Illuminate\Auth\Access\HandlesAuthorization;

class SellerPolicy
{
    use HandlesAuthorization;



    /**
     * Determine whether the user can create sellers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
       return !$user->seller()->exists() ;
    }
    public function show(User $user)
    {
       return $user->seller()->exists() ;
    }
    /**
     * Determine whether the user can create sellers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function store(User $user)
    {
        return !$user->seller()->exists() ;
    }
        /**
     * Determine whether the user can update the seller.
     *
     * @param  \App\User  $user
     * @param  \App\Seller  $seller
     * @return mixed
     */
    public function edit(User $user, Seller $seller)
    {
        return $user->id == $seller->user_id;
    }
    /**
     * Determine whether the user can update the seller.
     *
     * @param  \App\User  $user
     * @param  \App\Seller  $seller
     * @return mixed
     */
    public function update(User $user, Seller $seller)
    {
        return $user->id == $seller->user_id;
    }

    /**
     * Determine whether the user can delete the seller.
     *
     * @param  \App\User  $user
     * @param  \App\Seller  $seller
     * @return mixed
     */
    public function destroy(User $user, Seller $seller)
    {
        return $user->id == $seller->user_id;
    }
}
