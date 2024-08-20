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
            'identity_type' => $this->string()->notNull()->defaultValue(0)->comment('Identity Type'),
            'username' => $this->string()->unique()->notNull()->defaultValue('')->comment('Username'),
            'user_real_name' => $this->string()->notNull()->defaultValue('')->comment('Name'),
            'password_hash' => $this->string()->notNull()->defaultValue('')->comment('Password Hash'),
            'identity_card' => $this->string()->notNull()->defaultValue('')->comment('Identity Card'),
            'balance' => $this->decimal(10,2)->defaultValue(0.00)->comment('Balance'),
            'integral' => $this->integer()->notNull()->defaultValue(0)->comment('Integral'),
            'auth_key' => $this->string()->notNull()->defaultValue(''),
            'email' => $this->string()->notNull()->defaultValue('')->comment('Email'),
            'avatar' => $this->string()->notNull()->defaultValue('')->comment('Avatar'),
            'address' => $this->string()->notNull()->defaultValue('')->comment('Address'),
            'status' => $this->smallInteger()->notNull()->defaultValue(1)->comment('Status'),
            'operator' => $this->string()->notNull()->defaultValue('')->comment('Operator'),
            'created_at' => $this->integer()->comment('Created At'),
            'updated_at' => $this->integer()->comment('Updated At'),
        ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT="用户表"');

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
