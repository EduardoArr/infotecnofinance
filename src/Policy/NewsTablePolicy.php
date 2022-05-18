<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\NewsTable;
use Authorization\IdentityInterface;

/**
 * News policy
 */
class NewsTablePolicy
{
    public function canIndex(IdentityInterface $user = null)
    {
        return true;
    }
}
