<?php


namespace app\models;


use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;
    public $text;
    public $topic;

    public function rules()
    {
        return [
            [['name', 'email', 'text', ], 'required'],
            ['email', 'email'],
            ['topic', 'validateCountry']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'text' => 'Текст',
            'topic' => 'Тема:'
        ];
    }

    public function validateCountry($attribute, $params){
        if (!in_array($this->$attribute, ['USA', 'India'])){
            $this->addError($attribute, 'Ту ту');
        }
    }


}