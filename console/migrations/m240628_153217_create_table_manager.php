<?php

use yii\db\Migration;

/**
 * Create Manager Table
 * Insert Into default admin user;
 * Class m240628_153217_create_table_manager
 */
class m240628_153217_create_table_manager extends Migration
{
    /**
     * @var mixed
     */
    public $tableName = "{{%manager}}";

    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable($this->tableName, [
            'id' => $this->primaryKey()->comment('ID'),
            'username' => $this->string()->notNull()->unique()->comment('用户名'),
            'auth_key' => $this->string(32)->notNull()->comment('认证秘钥'),
            'access_token' => $this->string()->null()->comment('访问令牌'),
            'password_hash' => $this->string()->notNull()->comment('密码哈希'),
            'email' => $this->string()->null()->comment('邮箱'),

            'status' => $this->smallInteger()->notNull()->defaultValue(10)->comment('状态 10-活跃 0-禁用'),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('更新时间'),
        ], $tableOptions);

        $this->insert($this->tableName, [
            'username' => 'admin',
            'auth_key' => 'admin_auth_key',
            'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
            'status' => 10,
            'created_at' => time(),
            'updated_at' => time()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240628_153217_create_table_manager cannot be reverted.\n";

        return false;
    }
    */
}
