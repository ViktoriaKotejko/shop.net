<?php


namespace app\controllers;


use yii\web\Controller;
use yii\web\View;

class TestController extends AppController
{
    public $my_var;
   // public $layout = 'test';

    public function actionIndex($name = 'Guest', $age = 25)
    {
        $this->layout = 'test';
        $this->my_var = 'My variable';
        \Yii::$app->view->params['t1'] = 'T1 params';
        $this->view->title = 'Test page';


        \Yii::$app->view->on(View::EVENT_END_BODY, function () {
            echo "<p>&copy; Yii2 " . date("Y") . "</p>";
        });

        return $this->render('index', compact('name', 'age'));
    }

    public function actionMyTest()
    {
        return $this->render('my-test');
    }

}