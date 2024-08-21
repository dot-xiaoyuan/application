<?php

use yii\db\Migration;

/**
 * Class m240821_140408_create_table_category
 */
class m240821_140408_create_table_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->null()->comment('Parent Category ID'),
            'name' => $this->string(255)->notNull()->comment('Category Name'),
            'slug' => $this->string(255)->notNull()->unique()->comment('URL Slug'),
            'description' => $this->text()->null()->comment('Category Description'),
            'status' => $this->smallInteger()->notNull()->defaultValue(1)->comment('Status (1: Active, 0: Inactive)'),
            'sort_order' => $this->integer()->notNull()->defaultValue(0)->comment('Sort Order'),
            'created_at' => $this->integer()->notNull()->comment('Created At'),
            'updated_at' => $this->integer()->notNull()->comment('Updated At'),
        ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT="分类表"');

        // 添加外键约束
        $this->addForeignKey(
            'fk-category-parent_id',
            '{{%category}}',
            'parent_id',
            '{{%category}}',
            'id',
            'SET NULL',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-category-parent_id', '{{%category}}');
        $this->dropTable('{{%category}}');
    }
}
