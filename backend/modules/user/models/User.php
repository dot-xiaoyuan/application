<?php

namespace backend\modules\user\models;

use common\models\Upload;
use Yii;
use yii\base\Exception;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string|null $identity_type Identity Type
 * @property string $username Username
 * @property string $password_hash Password Hash
 * @property string|null $identity_card Identity Card
 * @property float|null $balance balance
 * @property string|null $auth_key
 * @property string|null $email Email
 * @property string|null $avatar Avatar
 * @property string|null $address Address
 * @property int $status
 * @property string|null $operator Operator
 * @property int $created_at Created At
 * @property int $updated_at Updated At
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @var mixed
     */
    public $imageFile;
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
            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['password_hash'],
                ],
                'value' => Yii::$app->security->generatePasswordHash($this->password),
            ],
            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['operator'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['operator'],
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
            [['username', 'password'], 'required'],
            [['balance'], 'number'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['identity_type', 'username', 'password_hash', 'identity_card', 'auth_key', 'email', 'avatar', 'address', 'operator'], 'string', 'max' => 255],
            [['username'], 'unique'],
            ['status', 'default', 'value' => 0],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
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
            'password' => Yii::t('app', 'Password'),
            'identity_card' => Yii::t('app', 'Identity Card'),
            'balance' => Yii::t('app', 'Balance'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'email' => Yii::t('app', 'Email'),
            'avatar' => Yii::t('app', 'Avatar'),
            'address' => Yii::t('app', 'Address'),
            'status' => Yii::t('app', 'Status'),
            'operator' => Yii::t('app', 'Operator'),
            'created_at' => Yii::t('app', 'Create At'),
            'updated_at' => Yii::t('app', 'Updated At'),
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
