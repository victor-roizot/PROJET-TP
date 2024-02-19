<!-- L'utilisateur pourra voir une cabane en particulier et la réserver -->
<section>
    <h1>La cabanes</h1>
        <div class="articleview">
            <!-- Affichage de l'image' -->
            <img class="articleImageView" src="assets/img/items/<?= $itemDetails->image ?>" alt="Image de la cabane">

            <!-- Affichage du nom de la cabane -->
            <h1><?= $itemDetails->hut ?></h1>

            <!-- Affichage de la catégorie -->
            <p>
                <b>Catégorie :</b> <?= $itemDetails->categorie ?><br>
            </p>

            <!-- Affichage de la description -->
            <p class="viewDescription">
                <?= strip_tags($itemDetails->description) ?>
            </p>


            <?php

            if (isset($_SESSION['user']) && $_SESSION['user']['id_usersRoles'] == 255) { ?>

                <a class=lienForm href="/modifier-item-<?= $item->id ?>">modifier ma cabane</a>
            <?php } ?>
    </div>
</section>