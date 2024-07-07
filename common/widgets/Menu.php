<?php

namespace common\widgets;

use Yii;
use yii\base\Widget;
use yii\bootstrap5\Nav;
use yii\helpers\Html;

/**
 * Menu Widget
 * @author <yt.vertigo0927@gmail.com>
 * @property $menu
 */
class Menu extends Widget
{
    /**
     * @var mixed
     */
    private $_menu;

    public function getMenu(): array
    {
        return $this->_menu ?? Yii::$app->params['menu'];
    }

    public function setMenu($menu)
    {
        $this->_menu = $menu;
    }

    /**
     * @throws \Throwable
     */
    public function run()
    {
        $menu = $this->menu;
        foreach ($menu as $key => $item) {
            $menu[$key]['label'] =  Html::tag('span', $item['icon'], ['class' => 'nav-link-icon d-md-none d-lg-inline-block']).
                Html::tag('span', Yii::t('menu', $item['label']), ['class' => 'nav-link-title']);
        }

        return Nav::widget([
            'options' => ['class' => 'navbar-nav pt-lg-3'],
            'items' => $menu,
        ]);
    }
}