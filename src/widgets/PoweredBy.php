<?php

namespace hiqdev\thememanager\widgets;

use Yii;
use yii\base\Widget;

class PoweredBy extends Widget
{
    public $options = [];

    public function run()
    {
        return $this->render('PoweredBy', array_merge(Yii::$app->params, [
            'options' => $this->options,
        ]));
    }
}