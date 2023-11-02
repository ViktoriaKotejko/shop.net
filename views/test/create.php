<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="col-md-12">

    <h2><?= $this->title ?></h2>

    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?= Yii::$app->session->getFlash('error') ?>
        </div>
    <?php endif; ?>

    <?php $form = ActiveForm::begin([
        'id' => 'my-form',
        'options' => [
            'class' => 'form-horizontal',
            'data-pjax' => true,
        ],
        'fieldConfig' => [
            'template' => "{label} 
                            \n <div class='col-md-5'>{input}</div> 
                            \n <div class='col-md-5'>{hint} </div> 
                            \n <div class='col-md-5'>{error}</div> ",
            'labelOptions' => ['class' => 'col-md-2 control-label']
        ]
    ]) ?>

    <?= $form->field($country, 'code', ['enableAjaxValidation' => true]) ?>
    <?= $form->field($country, 'name') ?>
    <?= $form->field($country, 'population') ?>
    <?= $form->field($country, 'status')->checkbox([
        'template' => "{label} 
                            \n <div class='col-md-5'>{input}</div> 
                            \n <div class='col-md-5'>{hint} </div> 
                            \n <div class='col-md-5'>{error}</div> ",
        'labelOptions' => ['class' => 'col-md-2 control-label']

    ], false); ?>

    <div class="form-group">
        <div class="col-md-5 offset-2">
            <?= Html::submitButton('Отправить',
                ['class' => 'btn btn-primary btn-block']) ?>
        </div>
    </div>

     <?php ActiveForm::end() ?>


</div>
