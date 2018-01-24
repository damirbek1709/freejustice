<?php
/**
 * Created by PhpStorm.
 * User: damir
 * Date: 04.12.2017
 * Time: 18:32
 */

namespace app\controllers\user;

use Yii;
use dektrium\user\models\RecoveryForm;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use dektrium\user\controllers\RecoveryController as BaseRecoveryController;
use dektrium\user\models\User;
use dektrium\user\models\Token;
use yii\web\ForbiddenHttpException;

class RecoveryController extends BaseRecoveryController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    ['allow' => true, 'actions' => ['request', 'reset', 'approve'], 'roles' => ['?', 'admin', '@']],
                    ['allow' => true, 'actions' => ['add'], 'roles' => ['admin', '@']],
                ],
            ],
        ];
    }

    public function actionAdd()
    {
        if (!Yii::$app->user->identity->isAdmin) {
            throw  new ForbiddenHttpException("У вас нет доступа для этого действия");
        } else {
            if (!$this->module->enablePasswordRecovery) {
                throw new NotFoundHttpException();
            }

            /** @var RecoveryForm $model */
            $model = \Yii::createObject([
                'class' => RecoveryForm::className(),
                'scenario' => RecoveryForm::SCENARIO_REQUEST,
            ]);
            $event = $this->getFormEvent($model);

            $this->performAjaxValidation($model);
            $this->trigger(self::EVENT_BEFORE_REQUEST, $event);

            if ($model->load(\Yii::$app->request->post())) {

                $user = new User;
                $user->username = $model->email;
                $user->email = $model->email;
                $user->confirmed_at = time();
                $user->fullname = $_POST['fullmame'];
                $user->city = $_POST['city'];
                $user->parent =  $_POST['parent'];
                $user->save();
                $this->trigger(self::EVENT_AFTER_REQUEST, $event);

                $model->sendNotifyMessage();
                return $this->render('/message', [
                    'title' => \Yii::t('user', 'Письмо с кодом активации отправлено пользователю'),
                    'module' => $this->module,
                ]);
            }

            return $this->render('add', [
                'model' => $model,
            ]);
        }
    }

    public function actionApprove($id, $code)
    {
        if (!$this->module->enablePasswordRecovery) {
            throw new NotFoundHttpException();
        }
        $user = $this->finder->findUserById($id);
        /** @var Token $token */
        $token = $this->finder->findToken(['user_id' => $id, 'code' => $code, 'type' => Token::TYPE_APPROVE])->one();
        if (empty($token) || !$token instanceof Token) {
            throw new NotFoundHttpException();
        }
        $event = $this->getResetPasswordEvent($token);

        $this->trigger(self::EVENT_BEFORE_TOKEN_VALIDATE, $event);
        if ($token === null || $token->isExpired || $token->user === null) {
            $this->trigger(self::EVENT_AFTER_TOKEN_VALIDATE, $event);
            \Yii::$app->session->setFlash(
                'danger',
                \Yii::t('user', 'Recovery link is invalid or expired. Please try requesting a new one.')
            );
            return $this->render('/message', [
                'title' => \Yii::t('user', 'Invalid or expired link'),
                'module' => $this->module,
            ]);
        }

        /** @var RecoveryForm $model */
        $model = \Yii::createObject([
            'class' => RecoveryForm::className(),
            'scenario' => RecoveryForm::SCENARIO_RESET,
        ]);
        $event->setForm($model);

        $this->performAjaxValidation($model);
        $this->trigger(self::EVENT_BEFORE_RESET, $event);
        if ($model->load(\Yii::$app->getRequest()->post()) && $model->resetPassword($token)) {
            \Yii::$app->user->login($user, $user->module->rememberFor);
            $this->trigger(self::EVENT_AFTER_RESET, $event);
            return $this->render('/message', [
                'title' => \Yii::t('user', 'Password has been changed'),
                'module' => $this->module,
            ]);
        }

        return $this->render('approve', [
            'model' => $model,
        ]);
    }


}

?>