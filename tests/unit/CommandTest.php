<?php
declare(strict_types=1);

namespace Yiisoft\Db\Mysql\Tests;

/**
 * @group db
 * @group mysql
 */
class CommandTest extends \Yiisoft\Db\Tests\CommandTest
{
    public $driverName = 'mysql';

    protected $upsertTestCharCast = 'CONVERT([[address]], CHAR)';

    public function testAddDropCheck(): void
    {
        $this->markTestSkipped('MySQL does not support adding/dropping check constraints.');
    }
}
