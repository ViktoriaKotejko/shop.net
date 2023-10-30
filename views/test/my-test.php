 <?php $this->title = 'Моя тестовая страничка' ?>

  <?php

  $this->registerMetaTag([
          'name' => 'description',
      'content' => 'мета описание...',
      'description'
  ]);
  ?>

<p><code><?= __FILE__ ?></code></p>

  <?php //$this->registerJsFile('@web/js/script.js', ['depends' => 'yii\web\YiiAsset']) ?>

  <?php
  $js = <<<JS
alert('Hello');
JS;
  $this->registerJs($js, Yii\web\View::POS_HEAD);
  ?>
