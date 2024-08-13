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
            'identity_type' => $this->string()->null()->comment('身份类型'),
            'username' => $this->string()->notNull()->unique()->comment('用户名'),
            'password_hash' => $this->string()->notNull()->comment('密码hash'),
            'identity_card' => $this->string()->null()->comment('身份证号'),
            'auth_key' => $this->string()->null(),
            'email' => $this->string()->null()->comment('邮箱'),
            'avatar' => $this->string()->null()->comment('头像'),
            'address' => $this->string()->null()->comment('地址'),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'operator' => $this->string()->null()->comment('操作人'),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('更新时间'),
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
