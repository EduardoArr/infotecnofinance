<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CommentFixture
 */
class CommentFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'comment';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'comment' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'post_id' => 1,
                'created' => '2022-05-03 11:23:32',
            ],
        ];
        parent::init();
    }
}
