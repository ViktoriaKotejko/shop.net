<?php


namespace app\controllers;


use yii\web\Controller;

class TestController extends Controller
{

    public function actionIndex($name = 'Guest', $age = 25)
    {
       /* return $this->render('index', [
            'name' => $name,
            'age' => $age
        ]);*/

        return $this->render('index', compact('name', 'age'));
    }

    public function actionMyTest()
    {
        return __METHOD__;
    }

}