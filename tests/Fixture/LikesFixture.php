<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LikesFixture
 */
class LikesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'idLike' => 1,
                'idPost' => 1,
                'idUser' => 1,
                'contLikes' => 1,
            ],
        ];
        parent::init();
    }
}
