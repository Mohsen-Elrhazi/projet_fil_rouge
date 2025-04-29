<?php

namespace App\Policies;

use App\Models\Profile;
use App\Models\User;

class ProfilePolicy
{
    /**
     * Create a new policy instance.
     */
    public function update(User $user, Profile $profile): bool
    {
        return $user->id === $profile->user_id;
    }
}