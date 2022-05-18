<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\like;
use Authorization\IdentityInterface;

/**
 * like policy
 */
class likePolicy
{
    /**
     * Check if $user can add like
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\like $like
     * @return bool
     */
    public function canAdd(IdentityInterface $user, like $like)
    {
        if (isset($user['rol']) && $user['rol'] === 'admin' || $user['rol'] === 'users'){
            return true;
        }
       return false; 
    }

    /**
     * Check if $user can edit like
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\like $like
     * @return bool
     */
    public function canEdit(IdentityInterface $user, like $like)
    {
    }

    /**
     * Check if $user can delete like
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\like $like
     * @return bool
     */
    public function canDelete(IdentityInterface $user, like $like)
    {
        if (isset($user['rol']) && $user['rol'] === 'admin' || $user['rol'] === 'users'){
            if($user['id'] == $like->idUser || $user['rol'] === 'admin'){
                return true;
            }
        }
       return false; 
    }

    /**
     * Check if $user can view like
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\like $like
     * @return bool
     */
    public function canView(IdentityInterface $user, like $like)
    {
    }
}
