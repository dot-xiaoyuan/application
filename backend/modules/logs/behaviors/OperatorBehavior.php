<?php

namespace backend\modules\logs\behaviors;

use backend\modules\logs\models\OperatorLog;
use Yii;
use yii\base\Behavior;
use yii\db\BaseActiveRecord;

class OperatorBehavior extends Behavior
{
    public function events()
    {
        return [
            BaseActiveRecord::EVENT_AFTER_INSERT => 'afterInsert',
            BaseActiveRecord::EVENT_AFTER_UPDATE => 'afterUpdate',
        ];
    }

    public function afterInsert($event)
    {
        $this->logOperation('create', $event);
    }

    public function afterUpdate($event)
    {
        $this->logOperation('update', $event);
    }

    protected function logOperation($operation, $event)
    {
        $user = $event->sender;

        $log = new OperatorLog();
        $log->user_id = $user->id;
        $log->username = $user->username;
        $log->description = $this->getDescription($operation, $event);
        $log->ip_address = Yii::$app->request->userIP;
        $log->user_agent = Yii::$app->request->userAgent;
        $log->status = 1; // 默认为成功
        $log->save();
    }

    protected function getDescription($operation, $event)
    {
        $changedAttributes = $event->changedAttributes;
        return json_encode($changedAttributes);
        $description = ucfirst($operation) . ' ' . get_class($event->sender) . ' ID: ' . $event->sender->id;

        if ($operation === 'update') {
            $description .= ', ' . Yii::t('app', 'Changed attributes:') . json_encode($changedAttributes);
        }

        return $description;
    }
}