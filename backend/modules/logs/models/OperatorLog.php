<?php

namespace backend\modules\logs\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\BaseActiveRecord;

/**
 * This is the model class for table "{{%operator_log}}".
 *
 * @property int $id
 * @property int $user_id User ID
 * @property string $username Username
 * @property string $role Role
 * @property string $operation Operation
 * @property string $description Description
 * @property string $ip_address IP Address
 * @property string $user_agent UserAgent
 * @property int $created_at Created At
 * @property int $updated_at Updated At
 * @property int $status Status
 */
class OperatorLog extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    BaseActiveRecord::EVENT_BEFORE_INSERT => ['operation'],
                ],
                'value' => Yii::$app->user->identity->username,
            ],
            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    BaseActiveRecord::EVENT_BEFORE_INSERT => ['ip_address'],
                ],
                'value' => Yii::$app->request->getUserIP(),
            ],
            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    BaseActiveRecord::EVENT_BEFORE_INSERT => ['role'],
                ],
                'value' => current(array_keys(Yii::$app->authManager->getRolesByUser(Yii::$app->user->identity->id))),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%operator_log}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['user_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['username', 'role', 'operation', 'description', 'ip_address', 'user_agent'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'username' => Yii::t('app', 'Username'),
            'role' => Yii::t('app', 'Role'),
            'operation' => Yii::t('app', 'Operation'),
            'description' => Yii::t('app', 'Description'),
            'ip_address' => Yii::t('app', 'IP Address'),
            'user_agent' => Yii::t('app', 'UserAgent'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
