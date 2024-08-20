<?php

namespace backend\modules\user\models;

use backend\modules\logs\behaviors\OperatorBehavior;
use Yii;
use yii\base\Exception;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\BaseActiveRecord;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $identity_type Identity Type
 * @property string $username Username
 * @property string $user_real_name Name
 * @property string $password_hash Password Hash
 * @property string $identity_card Identity Card
 * @property float|null $balance Balance
 * @property int $integral Integral
 * @property string $auth_key
 * @property string $email Email
 * @property string $avatar Avatar
 * @property string $address Address
 * @property int $status Status
 * @property string $operator Operator
 * @property int|null $created_at Created At
 * @property int|null $updated_at Updated At
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @var mixed 密码
     */
    public $password;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @throws Exception
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            OperatorBehavior::class,
            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    BaseActiveRecord::EVENT_BEFORE_INSERT => ['password_hash'],
                ],
                'value' => Yii::$app->security->generatePasswordHash($this->password),
            ],
            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    BaseActiveRecord::EVENT_BEFORE_INSERT => ['operator'],
                    BaseActiveRecord::EVENT_BEFORE_UPDATE => ['operator'],
                ],
                'value' => Yii::$app->user->identity->username,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required', 'on' => 'create'],
            [['username'], 'required', 'on' => 'update'],
            [['integral', 'status', 'created_at', 'updated_at'], 'integer'],
            [['identity_type', 'username', 'user_real_name', 'password_hash', 'identity_card', 'auth_key', 'email', 'avatar', 'address', 'operator'], 'string', 'max' => 255],
            [['username'], 'unique'],
            ['status', 'default', 'value' => 0],
            [['avatar'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'identity_type' => Yii::t('app', 'Identity Type'),
            'username' => Yii::t('app', 'Username'),
            'user_real_name' => Yii::t('app', 'Name'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'identity_card' => Yii::t('app', 'Identity Card'),
            'balance' => Yii::t('app', 'Balance'),
            'integral' => Yii::t('app', 'Integral'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'email' => Yii::t('app', 'Email'),
            'avatar' => Yii::t('app', 'Avatar'),
            'address' => Yii::t('app', 'Address'),
            'status' => Yii::t('app', 'Status'),
            'operator' => Yii::t('app', 'Operator'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // 如果没有上传新图片，保留旧的图片路径
            if (empty($this->avatar)) {
                $this->avatar = $this->getOldAttribute('avatar');
            }
            return true;
        }
        return false;
    }
}
