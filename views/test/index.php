<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

?>

<div class="col-md-12">

    <h2>Страница с формой</h2>
    <?php \app\components\HelloWidget::begin(['name'=>'Vika']); ?>
        <h1>Контент виджета</h1>

     <?php \app\components\HelloWidget::end();  ?>

     <?php Pjax::begin() ?>



    <?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Введите имя']) ?>

    <?= $form->field($model, 'email')->input('email', ['placeholder' => 'Введите email']) ?>

    <?= $form->field($model, 'topic', ['enableAjaxValidation' => false])->input('text', ['placeholder' => 'Введите Тему сообщения']) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 7, 'placeholder' => 'Введите текст']) ?>



    <div class="form-group">
        <div class="col-md-5 offset-2">
            <?= Html::submitButton('Отправить',
                ['class' => 'btn btn-primary btn-block']) ?>
        </div>

    </div>

    <?php ActiveForm::end(); ?>
     <?php Pjax::end(); ?>

</div>

 <?php
 $js = <<<JS
var  form = $('#my-form');
form.on('beforeSubmit', function (){
    var data = form.serialize();
    $.ajax({
        url: form.attr('action'),
        type: 'POST',
        data: data,
        success: function (res){
            console.log(res);
            form[0].reset();
        },
        error: function (){
            alert('Error');
        }
    });
    return false;
})
JS;

// $this->registerJs($js);

 ?>







