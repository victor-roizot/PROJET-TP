<!-- L'utilisateur pourra voir la liste les cabanes à louer -->
<h1>cabanes</h1>
<div>
    <!-- Boucle des éléments de la liste des items -->
    <?php foreach ($itemsList as $i) { ?>
        <div>
            <!-- Affichage de l'image' -->
            <img src="assets/img/items/<?= $i->image ?>" alt="Image de la cabane">
            <div>
                <!-- Affichage du nom de la cabane -->
                <h2><?= $i->hut ?></h2>

                <!-- Affichage de la catégorie -->
                <p>
                    <b>Catégorie :</b> <?= $i->categorie ?><br>
                </p>

                <!-- Affichage de la description -->
                <p>
                    <?= strip_tags($i->description) ?>...
                </p>

                <!-- Lien vers la page détaillée de la cabane -->
                <a class=lien href="/cabane-<?= $i->id ?>">Lire la suite</a>
            </div>
        </div>
    <?php } ?>
</div>