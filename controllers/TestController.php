<?php


namespace app\controllers;


use app\models\Country;
use app\models\EntryForm;
use yii\web\Controller;
use yii\web\Response;
use yii\widgets\ActiveForm;

class TestController extends AppController
{


    public function actionIndex($name = 'Guest', $age = 25){
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
        }
        return $this->render('index', compact('model'));
    }

    public function actionMyTest(){
        return $this->render('my-test');
    }

    public function actionView(){
        $this->layout = 'test';
        $this->view->title = 'Работа с моделями';

//        $contries = Country::find()->where('population < 100000000 AND code <> "AU" ')->all();
//        $contries = Country::find()->where('population < :population AND code <> :code' ,[':code' => "AU", ':population' => 100000000])->all();
   /*     $contries = Country::find()->where([
            'code' => ['DE', 'FR', 'GB'],
            'status' => 1,
        ])->all();*/

        //$contries = Country::find()->where(['like','name','ni'])->all();
//        $contries = Country::find()->orderBy('population DESC')->all();
       // $contries = Country::find()->count();
       // debug($contries, 1);

//        $contries = Country::find()->limit(1);
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
//        $country->code = 'UA';
//        $country->name = 'Ukraine';
//        $country->population = '4184000';
//        $country->status = '1';

        if ($country->load(\Yii::$app->request->post()) && $country->save()){
            \Yii::$app->session->setFlash('success', 'OK');
            return $this->refresh();
        }

        return $this->render('create', compact('country'));
    }

}