 <?php foreach ($categories as $category): ?>
        <h4><?= $category->title ?></h4>
       <?php foreach($category->products as $product): ?>
            <p><?= $product->title ?> | <?= $product->price ?></p>
        <?php endforeach; ?>
         <hr>
  <?php endforeach; ?>

