<?php

namespace common\widgets;

use yii\base\Widget;
use yii\bootstrap5\Nav;

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
        return $this->_menu ?? \Yii::$app->params['menu'];
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
            $menu[$key]['label'] = $item['icon'] . $item['label'];
        }

        return Nav::widget([
            'options' => ['class' => 'navbar-nav pt-lg-3'],
            'items' => $menu,
        ]);
    }


}