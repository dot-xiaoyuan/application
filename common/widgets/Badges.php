<?php

namespace common\widgets;


use yii\base\Widget;
use yii\helpers\Html;

/**
 * Badges
 * @property $type
 * @property $content
 *
 * @author <yt.vertigo0927@gmail.com>
 */
class Badges extends Widget
{
    /**
     * @var mixed
     */
    private $_type;

    /**
     * @var mixed $content
     */
    public $content;

    public function getType(): string
    {
        return $this->_type ?? 'success';
    }

    public function setType($type)
    {
        $this->_type = $type;
    }

    public array $badgesType = [
        'error' => 'bg-danger',
        'danger' => 'bg-danger',
        'success' => 'bg-success',
        'info' => 'bg-info',
        'warning' => 'bg-warning'
    ];

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        echo Html::tag('span', '', [
                'class' => 'badge me-1 ' . $this->badgesType[$this->type]
            ]) . $this->content;
    }
}