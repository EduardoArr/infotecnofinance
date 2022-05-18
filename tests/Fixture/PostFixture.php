<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PostFixture
 */
class PostFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'post';
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
                'tittle' => 'Lorem ipsum dolor sit amet',
                'brief' => 'Lorem ipsum dolor sit amet',
                'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'image' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-04-12 10:17:29',
                'category_id' => 1,
                'user_id' => 1,
            ],
        ];
        parent::init();
    }
}
