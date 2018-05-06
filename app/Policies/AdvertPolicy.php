<?php

namespace App\Policies;

use App\User;
use App\Advert;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvertPolicy
{
    use HandlesAuthorization;



        /**
     * Determine whether the user can view adverts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function index(User $user)
    {
        return $user->seller()->exists();
    }
    /**
     * Determine whether the user can create adverts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->seller()->exists();
    }

    /**
     * Determine whether the user can store adverts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function store(User $user)
    {
        return $user->seller()->exists();
    }

    
    /**
     * Determine whether the user can edit the advert.
     *
     * @param  \App\User  $user
     * @param  \App\Advert  $advert
     * @return mixed
     */
    public function edit(User $user, Advert $advert)
    {
        return $user->id == $advert->seller()->first()->user_id;
    }

    /**
     * Determine whether the user can update the advert.
     *
     * @param  \App\User  $user
     * @param  \App\Advert  $advert
     * @return mixed
     */
    public function update(User $user, Advert $advert)
    {
        return $user->id == $advert->seller()->first()->user_id;
    }

    /**
     * Determine whether the user can delete the advert.
     *
     * @param  \App\User  $user
     * @param  \App\Advert  $advert
     * @return mixed
     */
    public function destroy(User $user, Advert $advert)
    {
        
        return $user->id == $advert->seller()->first()->user_id;
    }
}
