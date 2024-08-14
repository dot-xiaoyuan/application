<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m240813_134608_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'identity_type' => $this->string()->null()->comment('Identity Type'),
            'username' => $this->string()->notNull()->unique()->comment('Username'),
            'password_hash' => $this->string()->notNull()->comment('Password Hash'),
            'identity_card' => $this->string()->null()->comment('Identity Card'),
            'balance' => $this->decimal(10,2)->defaultValue(0.00)->comment('balance'),
            'auth_key' => $this->string()->null(),
            'email' => $this->string()->null()->comment('Email'),
            'avatar' => $this->string()->null()->comment('Avatar'),
            'address' => $this->string()->null()->comment('Address'),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'operator' => $this->string()->null()->comment('Operator'),
            'created_at' => $this->integer()->comment('Created At'),
            'updated_at' => $this->integer()->comment('Updated At'),
        ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4');

        $this->createIndex('index_username', '{{%user}}', 'username');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
