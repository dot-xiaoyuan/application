<?php

namespace backend\modules\user\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string|null $identity_type 身份类型
 * @property string $username 用户名
 * @property string $password_hash 密码hash
 * @property string|null $identity_card 身份证号
 * @property string|null $auth_key
 * @property string|null $email 邮箱
 * @property string|null $avatar 头像
 * @property string|null $address 地址
 * @property int $status
 * @property string|null $operator 操作人
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['identity_type', 'username', 'password_hash', 'identity_card', 'auth_key', 'email', 'avatar', 'address', 'operator'], 'string', 'max' => 255],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'identity_type' => Yii::t('app', '身份类型'),
            'username' => Yii::t('app', '用户名'),
            'password_hash' => Yii::t('app', '密码hash'),
            'identity_card' => Yii::t('app', '身份证号'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'email' => Yii::t('app', '邮箱'),
            'avatar' => Yii::t('app', '头像'),
            'address' => Yii::t('app', '地址'),
            'status' => Yii::t('app', 'Status'),
            'operator' => Yii::t('app', '操作人'),
            'created_at' => Yii::t('app', '创建时间'),
            'updated_at' => Yii::t('app', '更新时间'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
