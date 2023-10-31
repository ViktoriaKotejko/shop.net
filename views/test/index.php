 <?php

 use yii\helpers\Html;
 use yii\widgets\ActiveForm;

 ?>
<div class="col-md-12">
    <h2>Страница с формой</h2>
     <?php $form = ActiveForm::begin()?>
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'text')->textarea(['rows'=>7]) ?>
        <div class="form-group">
            <?= Html::submitButton('Отправить',
                ['class' => 'btn btn-default']) ?>
        </div>

     <?php ActiveForm::end(); ?>

</div>







