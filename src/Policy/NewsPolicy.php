<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\News;
use Authorization\IdentityInterface;

/**
 * News policy
 */
class NewsPolicy
{
    /**
     * Check if $user can add News
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\News $news
     * @return bool
     */
    public function canAdd(IdentityInterface $user, News $news)
    {
        if (isset($user['rol']) && $user['rol'] === 'admin'){
            return true;
        }
       return false;
    }

    /**
     * Check if $user can edit News
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\News $news
     * @return bool
     */
    public function canEdit(IdentityInterface $user, News $news)
    {
        if (isset($user['rol']) && $user['rol'] === 'admin'){
            return true;
        }
       return false;
    }

    /**
     * Check if $user can delete News
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\News $news
     * @return bool
     */
    public function canDelete(IdentityInterface $user, News $news)
    {
        if (isset($user['rol']) && $user['rol'] === 'admin'){
            return true;
        }
       return false; 
    }

    /**
     * Check if $user can view News
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\News $news
     * @return bool
     */
    public function canView(IdentityInterface $user, News $news)
    {
        return true;
    }
}
