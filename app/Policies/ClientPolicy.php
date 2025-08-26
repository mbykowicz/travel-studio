<?php

namespace App\Policies;

use App\Models\Client;
use App\Models\User;
<<<<<<< HEAD

// TODO: add user related authorization
=======
use Illuminate\Auth\Access\Response;

>>>>>>> 6b108de9314e357a17973e19c3251c8026c7f1ea
class ClientPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
<<<<<<< HEAD
        return true;
=======
        return false;
>>>>>>> 6b108de9314e357a17973e19c3251c8026c7f1ea
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Client $client): bool
    {
<<<<<<< HEAD
        return true;
=======
        return false;
>>>>>>> 6b108de9314e357a17973e19c3251c8026c7f1ea
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
<<<<<<< HEAD
        return true;
=======
        return false;
>>>>>>> 6b108de9314e357a17973e19c3251c8026c7f1ea
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Client $client): bool
    {
<<<<<<< HEAD
        return true;
=======
        return false;
>>>>>>> 6b108de9314e357a17973e19c3251c8026c7f1ea
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Client $client): bool
    {
<<<<<<< HEAD
        return true;
=======
        return false;
>>>>>>> 6b108de9314e357a17973e19c3251c8026c7f1ea
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Client $client): bool
    {
<<<<<<< HEAD
        return true;
=======
        return false;
>>>>>>> 6b108de9314e357a17973e19c3251c8026c7f1ea
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Client $client): bool
    {
<<<<<<< HEAD
        return true;
=======
        return false;
>>>>>>> 6b108de9314e357a17973e19c3251c8026c7f1ea
    }
}
