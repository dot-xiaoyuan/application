<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%operator_log}}`.
 */
class m240819_134143_create_operator_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%operator_log}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->null()->comment('User ID'),
            'username' => $this->string()->null()->comment('Username'),
            'role' => $this->string()->null()->comment('Role'),
            'operation' => $this->string()->notNull()->comment('Operation'),
            'description' => $this->string()->null()->comment('Description'),
            'ip_address' => $this->string()->null()->comment('IP Address'),
            'user_agent' => $this->string()->null()->comment('UserAgent'),
            'created_at' => $this->integer()->null()->comment('Created At'),
            'updated_at' => $this->integer()->null()->comment('Updated At'),
            'status' => $this->integer()->null()->defaultValue(0)->comment('Status'),
        ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT="操作日志表"');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%operator_log}}');
    }
}
