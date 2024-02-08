<h1>cabanes</h1>
<div>
    <?php foreach ($itemsList as $i) { ?>
        <div>
            <img src="assets/img/items/<?= $i->image ?>" alt="Image de la cabane">
            <div>
                <h2><?= $i->hut ?></h2>
                <p>
                    <b>Catégorie :</b> <?= $i->categorie ?><br>
                </p>
                <p>
                    <?= strip_tags($i->description) ?>...
                </p>
                <a class=lien href="/cabane-<?= $i->id ?>">Lire la suite</a>
            </div>
        </div>
    <?php } ?>
</div>