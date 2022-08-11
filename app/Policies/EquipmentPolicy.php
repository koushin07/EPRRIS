<?php

namespace App\Policies;

use App\Models\Equipment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EquipmentPolicy
{
    use HandlesAuthorization;

    // public function viewAny(User $user)
    // {
    //     //
    // }

    // public function view(User $user, Equipment $equipment)
    // {
    //     //
    // }

  
    // public function create(User $user)
    // {
    //     //
    // }

 
    public function update(User $user, Equipment $equipment)
    {
       return $equipment->municipality_id==1;
    }

  
    public function delete(User $user, Equipment $equipment)
    {
        //
    }

   
    public function restore(User $user, Equipment $equipment)
    {
        //
    }

   
    public function forceDelete(User $user, Equipment $equipment)
    {
        //
    }
}
