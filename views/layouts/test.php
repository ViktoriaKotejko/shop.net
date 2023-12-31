 <?php
 use app\assets\TestAsset;
 use yii\helpers\Html;

 $this->beginPage();

 TestAsset::register($this);
 ?>



<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
     <?php $this->head() ?>
</head>
<body>
 <?php $this->beginBody() ?>
 <div class="container">
     <div class="row">
         <?=  $content ?>
     </div>
 </div>


 <?php $this->endBody() ?>
</body>
</html>
  <?php $this->endPage() ?>