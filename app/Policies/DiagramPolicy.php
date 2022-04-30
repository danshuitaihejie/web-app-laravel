<?php

namespace App\Policies;

use App\Models\Diagram;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class DiagramPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        logger('DiagramPolicy viewAny');
        return  true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Diagram  $diagram
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Diagram $diagram)
    {
        logger('DiagramPolicy view');
        return  true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        logger('DiagramPolicy create');
        if(!$user->hasPermissionTo('create diagram'))
        {
            return  false;
        }
        return  true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Diagram  $diagram
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Diagram $diagram)
    {
        logger('DiagramPolicy update.$user->id:'.$user->id.'  $diagram->author_id:'.$diagram->author_id);
        if(!$user->hasPermissionTo('edit diagram'))
        {
            return  false;
        }

        if($user->hasRole('admin'))
        {
            return  true;
        }
        return $user->id == $diagram->author_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Diagram  $diagram
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Diagram $diagram)
    {
        logger('DiagramPolicy delete');
        if(!$user->hasPermissionTo('delete diagram'))
        {
            return  false;
        }
        if($user->hasRole('admin'))
        {
            return  true;
        }
        return $user->id == $diagram->author_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Diagram  $diagram
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Diagram $diagram)
    {
        return  true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Diagram  $diagram
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Diagram $diagram)
    {
        logger('DiagramPolicy forceDelete');
        if(!$user->hasPermissionTo('delete diagram'))
        {
            return  false;
        }
        if($user->hasRole('admin'))
        {
            return  true;
        }
        return $user->id == $diagram->author_id;
    }
}
