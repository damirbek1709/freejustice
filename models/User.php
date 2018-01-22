<?php namespace app\models;
use dektrium\user\models\Token;
use dektrium\user\models\User as BaseUser;

class User extends BaseUser
{
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        // add field to scenarios
        $scenarios['create'][]   = 'parent';
        $scenarios['update'][]   = 'parent';
        return $scenarios;
    }

    public function rules()
    {
        $rules = parent::rules();
        // add some rules
        $rules['fieldRequired'] = ['parent', 'required'];
        $rules['fieldLength']   = ['parent', 'number', 'max' => 11];

        return $rules;
    }
    public function getChilds(){
        return $this->hasMany(User::className(), ['parent' => 'id']);
    }
}

?>