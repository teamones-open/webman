<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTestTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $item = $this->table('test', ['id' => false, 'primary_key' => ['id'], 'engine' => 'InnoDB', 'collation' => 'utf8mb4_general_ci']);

        $item->addColumn('id', 'integer', ['identity' => true, 'signed' => false, 'limit' => 11, 'comment' => '主键ID'])
            ->addColumn('name', 'string', ['default' => '', 'limit' => 255, 'comment' => '名称'])
            ->addColumn('create_time', 'integer', ['signed' => false, 'default' => 0, 'limit' => 11, 'comment' => '创建时间'])
            ->addColumn('update_time', 'integer', ['signed' => false, 'default' => 0, 'limit' => 11, 'comment' => '更新时间'])
            ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('test')->drop()->save();
    }
}
