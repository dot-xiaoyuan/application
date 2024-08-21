<?php

namespace backend\modules\category\models;

use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property int $id
 * @property int|null $parent_id Parent Category ID
 * @property string $name Category Name
 * @property string $slug URL Slug
 * @property string|null $description Category Description
 * @property int $status Status (1: Active, 0: Inactive)
 * @property int $sort_order Sort Order
 * @property int $created_at Created At
 * @property int $updated_at Updated At
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'status', 'sort_order', 'created_at', 'updated_at'], 'integer'],
            [['name', 'slug', 'created_at', 'updated_at'], 'required'],
            [['description'], 'string'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent Category ID'),
            'name' => Yii::t('app', 'Category Name'),
            'slug' => Yii::t('app', 'URL Slug'),
            'description' => Yii::t('app', 'Category Description'),
            'status' => Yii::t('app', 'Status (1: Active, 0: Inactive)'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
