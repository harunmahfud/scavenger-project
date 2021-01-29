<?php

use yii\db\Migration;

/**
 * Class m210126_005412_create_base_tables
 */
class m210126_005412_create_base_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('code', [
            'id' => $this->primaryKey(),
            'code' => $this->string(255)->notNull(),
            'accessed_at' => $this->dateTime(),
        ]);
        $this->createTable('clue', [
            'id' => $this->primaryKey(),
            'code_id' => $this->integer()->notNull(),
            'clue' => $this->text(),
        ]);
        $this->addForeignKey(
            'fk-clue-code_id',
            'clue',
            'code_id',
            'code',
            'id',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-clue-code_id', 'clue');
        $this->dropTable('clue');
        $this->dropTable('code');
    }
}
