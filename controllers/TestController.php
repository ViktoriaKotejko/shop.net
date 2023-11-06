<?php


namespace app\controllers;


use app\models\Country;
use app\models\EntryForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

class TestController extends AppController
{


    public function actionIndex($alert ='', $name = 'Guest', $age = 25){
        $this->layout = 'test';
        $this->view->title = 'Test page';

        switch ($alert){
            case 'error':
                \Yii::$app->session->setFlash('error', 'Error');
                break;
            case 'success':
                \Yii::$app->session->setFlash('success', 'OK');
                break;
            case 'info':
                \Yii::$app->session->setFlash('info', 'info');
                break;
            case 'warning':
                \Yii::$app->session->setFlash('warning', 'warning');
                break;
           default:
                \Yii::$app->session->setFlash('danger', 'danger');
                break;
        }

        $model = new EntryForm();


        if ($model->load(\Yii::$app->request->post())){
            if ($model->validate()){
                \Yii::$app->session->setFlash('success', 'OK');
                return $this->refresh();

            } else{
                \Yii::$app->session->setFlash('error', 'Error');
            }
        }
        return $this->render('index', compact('model'));
    }

    public function actionMyTest(){
        return $this->render('my-test');
    }

    public function actionView(){
        $this->layout = 'test';
        $this->view->title = 'Работа с моделями';

       $contries = Country::findAll('DE');


        return $this->render('view', compact('contries'));
    }

    public function actionCreate(){
        $this->layout = 'test';
        $this->view->title = 'Create';

        $country = new Country();

        if (\Yii::$app->request->isAjax){
            $country->load(\Yii::$app->request->post());
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($country);
        }

        if ($country->load(\Yii::$app->request->post()) && $country->save()){
            \Yii::$app->session->setFlash('success', 'OK');
            return $this->refresh();
        }

        return $this->render('create', compact('country'));
    }

    public function actionUpdate(){
        $this->layout = 'test';
        $this->view->title = 'Update';

        $country = Country::findOne('UA');
        if (!$country){
            throw new NotFoundHttpException('Country not found');
        }
        if ($country->load(\Yii::$app->request->post()) && $country->save()){
            \Yii::$app->session->setFlash('success', 'OK');
            return $this->refresh();
        }
        return $this->render('update', compact('country'));

    }

    public function actionDelete($code = ''){
        $this->layout = 'test';
        $this->view->title = 'Delete';

        $country = Country::findOne($code);
        if ($country){
            if (false !== $country->delete()){
                \Yii::$app->session->setFlash('success', 'OK');
            }else {
                \Yii::$app->session->setFlash('error', 'error');
            }
        }

        return $this->render('delete', compact('country'));

    }

}