<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Comment;
use Authorization\IdentityInterface;

/**
 * Comment policy
 */
class CommentPolicy
{
    /**
     * Check if $user can add Comment
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Comment $comment
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Comment $comment)
    {
        if (isset($user['rol']) && $user['rol'] === 'admin' || $user['rol'] === 'users'){
            return true;
        }
       return false;
    }

    /**
     * Check if $user can edit Comment
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Comment $comment
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Comment $comment)
    {
    }

    /**
     * Check if $user can delete Comment
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Comment $comment
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Comment $comment)
    {
        if (isset($user['rol']) && $user['rol'] === 'admin' || $user['rol'] === 'users'){
            if($user['id'] == $comment->user_id || $user['rol'] === 'admin'){
                return true;
            }
        }
       return false;
    }

    /**
     * Check if $user can view Comment
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Comment $comment
     * @return bool
     */
    public function canView(IdentityInterface $user, Comment $comment)
    {
        return true;
    }
}
