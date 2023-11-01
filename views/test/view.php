<div class="col-md-12">
    <h1>Работа с моделями</h1>
    <table class="table">
        <?php foreach ($contries as $country): ?>
            <tr>
                <td> <?= $country->code ?></td>
                <td> <?= $country->name ?></td>
                <td> <?= $country->population ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>