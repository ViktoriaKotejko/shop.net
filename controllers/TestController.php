<?php


namespace app\controllers;


use app\models\EntryForm;
use yii\web\Controller;
use yii\web\Response;
use yii\widgets\ActiveForm;

class TestController extends AppController
{


    public function actionIndex($name = 'Guest', $age = 25)
    {
        $this->layout = 'test';
        \Yii::$app->view->params['t1'] = 'T1 params';
        $this->view->title = 'Test page';

        $model = new EntryForm();



        if (\Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            if ($model->validate())
            {
               return ['message' => 'ok'];
            } else{
                return ActiveForm::validate($model);
            }
            //return ActiveForm::validate($model);
        }


        return $this->render('index', compact('model'));
    }

    public function actionMyTest()
    {
        return $this->render('my-test');
    }

}