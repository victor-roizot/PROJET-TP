<div>
    <img src="assets/img/items/<?= $itemDetails->image ?>" alt="Image de la cabane">
    <h1><?= $itemDetails->hut ?></h1>
    <p>
        <b>Catégorie :</b> <?= $itemDetails->categorie ?><br>
    </p>
    <p>
        <?= strip_tags($itemDetails->description) ?>
    </p>
</div>