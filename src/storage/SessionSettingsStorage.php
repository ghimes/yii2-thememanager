<?php

namespace hiqdev\thememanager\storage;

use Yii;
use yii\base\Component;
use yii\base\Model;

class SessionSettingsStorage extends Component implements SettingsStorageInterface
{
    /**
     * @var string
     */
    public $sessionKey = 'themeManger.themeSettings';

    /**
     * @param Model $model the settings model
     */
    public function set(Model $model)
    {
        $data = $model->toArray();
        Yii::$app->session->set($this->sessionKey, $data);
    }

    /**
     * @inheritdoc
     */
    public function get()
    {
        return Yii::$app->session->get($this->sessionKey);
    }
}
