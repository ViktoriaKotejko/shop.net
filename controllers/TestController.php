<?php


namespace app\controllers;


use app\models\EntryForm;
use yii\web\Controller;

class TestController extends AppController
{


    public function actionIndex($name = 'Guest', $age = 25)
    {
        $this->layout = 'test';
        \Yii::$app->view->params['t1'] = 'T1 params';
        $this->view->title = 'Test page';

        $model = new EntryForm();

        if ($model->load(\Yii::$app->request->post()) && $model->validate())
        {
            if (\Yii::$app->request->isPjax){
                \Yii::$app->session->setFlash('success','Данные приняты Pjax ');
                $model = new EntryForm();
            }else
                \Yii::$app->session->setFlash('success','Данные приняты');
                return $this->refresh();
        }


        return $this->render('index', compact('model'));
    }

    public function actionMyTest()
    {
        return $this->render('my-test');
    }

}