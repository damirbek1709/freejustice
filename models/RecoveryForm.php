<?php
/**
 * Created by PhpStorm.
 * User: damir
 * Date: 04.12.2017
 * Time: 20:29
 */

namespace app\models;

use dektrium\user\models\Token;
use dektrium\user\Finder;
use dektrium\user\Mailer;
use Yii;

use dektrium\user\models\RecoveryForm as BaseRecoveryForm;

class RecoveryForm extends BaseRecoveryForm
{

}