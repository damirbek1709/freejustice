<?php
/**
 * Created by PhpStorm.
 * User: damir
 * Date: 04.12.2017
 * Time: 18:32
 */

namespace app\controllers\user;

use dektrium\user\controllers\SecurityController as BaseSecurityController;
use dektrium\user\models\LoginForm;
use Yii;
use yii\helpers\Url;

class SecurityController extends BaseSecurityController
{


    public function actionLogin()
    {
        //$this->layout = "empty";
        if (!\Yii::$app->user->isGuest) {
            $this->goHome();
        }

        /** @var LoginForm $model */
        $model = \Yii::createObject(LoginForm::className());
        $event = $this->getFormEvent($model);

        $this->performAjaxValidation($model);

        $this->trigger(self::EVENT_BEFORE_LOGIN, $event);

        if ($model->load(\Yii::$app->getRequest()->post()) && $model->login()) {
            $this->trigger(self::EVENT_AFTER_LOGIN, $event);
            return $this->goBack();
        }

        return $this->render('login', [
            'model'  => $model,
            'module' => $this->module,
        ]);
    }
}

?>