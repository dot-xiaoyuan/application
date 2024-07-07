<?php

namespace common\widgets;

use Yii;
use yii\base\InvalidConfigException;
use yii\bootstrap5\Nav;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Menu Widget
 * @author <yt.vertigo0927@gmail.com>
 * @property $menu
 */
class Menu extends Nav
{
    public $options = ['class' => 'navbar-nav pt-lg-3'];

    public $activateParents = true;

    public function init()
    {
        $this->items = Yii::$app->params['menu'];
        parent::init();
    }

    public function renderItem($item): string
    {
        if (is_string($item)) {
            return $item;
        }
        if (!isset($item['label'])) {
            throw new InvalidConfigException("The 'label' option is required.");
        }
        $encodeLabel = $item['encode'] ?? $this->encodeLabels;
        $label = $encodeLabel ? \yii\bootstrap5\Html::encode($item['label']) : $item['label'];
        $options = ArrayHelper::getValue($item, 'options', []);
        $items = ArrayHelper::getValue($item, 'items');
        $url = ArrayHelper::getValue($item, 'url', '#');
        $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);
        $disabled = ArrayHelper::getValue($item, 'disabled', false);
        $active = $this->isItemActive($item);

        if (isset($item['icon'])) {
            $label = Html::beginTag('span', ['class' => 'nav-link-icon d-md-none d-lg-inline-block']) .
                $item['icon'] . Html::endTag('span') .
                Html::beginTag('span', ['class' => 'nav-link-title']) . Yii::t('menu', $label) . Html::endTag('span');
        }
        if (empty($items)) {
            $items = '';
            Html::addCssClass($options, ['widget' => 'nav-item']);
            Html::addCssClass($linkOptions, ['widget' => 'nav-link']);
        } else {
            $linkOptions['data']['bs-toggle'] = 'dropdown';
            $linkOptions['role'] = 'button';
            $linkOptions['aria']['expanded'] = 'false';
            $linkOptions['data-bs-auto-close'] = 'false';
            Html::addCssClass($options, ['widget' => 'dropdown nav-item']);
            Html::addCssClass($linkOptions, ['widget' => 'nav-link dropdown-toggle']);
            if (is_array($items)) {
                $this->disposeDropItem($items);
                $items = $this->isChildActive($items, $active);
                if ($active) {
                    $item['dropdownOptions'] = ['class' => 'show'];
                }
                $items = $this->renderDropdown($items, $item);
            }
        }

        if ($disabled) {
            ArrayHelper::setValue($linkOptions, 'tabindex', '-1');
            ArrayHelper::setValue($linkOptions, 'aria.disabled', 'true');
            Html::addCssClass($linkOptions, ['disable' => 'disabled']);
        } elseif ($this->activateItems && $active) {
            Html::addCssClass($linkOptions, ['activate' => 'active']);
        }

        return Html::tag('li', Html::a($label, $url, $linkOptions) . $items, $options);
    }

    public function disposeDropItem(&$items)
    {
        foreach ($items as $key => $item) {
            $label = Yii::t('menu', $item['label']);
            $items[$key]['label'] = $label;
        }
    }
}