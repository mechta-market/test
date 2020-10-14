<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190902_113920_initial_structure
 */
class m190902_113920_initial_structure extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('deny', [
            'id' => Schema::TYPE_PK,
            'city' => Schema::TYPE_STRING,
            'type' => Schema::TYPE_STRING,
        ]);

        $this->createIndex('ux_deny', 'deny', ['city', 'type'], true);

        $this->createTable('type', [
            'id' => Schema::TYPE_PK,
            'type' => Schema::TYPE_STRING,
            'price' => Schema::TYPE_DOUBLE
        ]);

        $this->createIndex('ux_type', 'type', 'type', true);

        $this->insert('deny', [
            'city' => 'almaty',
            'type' => 'post',
        ]);

        $this->insert('type', [
            'type' => 'pickup',
            'price' => 0.00,
        ]);

        $this->insert('type', [
            'type' => 'courier',
            'price' => 9.99,
        ]);

        $this->insert('type', [
            'type' => 'post',
            'price' => 15.99,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('deny');
        $this->dropTable('type');
        return false;
    }

}
