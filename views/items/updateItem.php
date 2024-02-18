<!-- L'utilisateur modifiera ou  supprimera son compte  par ce formulaire -->
<section>
    <h1>Modifier ma cabane</h1>

    <?php if (isset($success)) { ?>
        <p class="success"><?= $success ?></p>
    <?php } ?>


    <!-- UPDATE ITEM -->
    <?php if (isset($errors['updateItem'])) { ?>
        <p class="errors"><?= $errors['updateItem'] ?></p>
    <?php } ?>
    <div class="formContainer">
        <form class="form" action="/modifier-item-<?= $item->id ?>" method="post" enctype="multipart/form-data">

            <label for="image">Image de la cabane</label>
            <input type="file" name="image" id="image">
            <?php if (isset($errors['image'])) { ?>
                <p class="errors"><?= $errors['image'] ?></p>
            <?php } ?>

            <label for="hut">Nom de la cabane</label>
            <input type="text" name="hut" id="hut" value="<?= $itemDetails->hut ?>">
            <?php if (isset($errors['hut'])) { ?>
                <p class="errors"><?= $errors['hut'] ?></p>
            <?php } ?>

            <label for="categories">Catégorie de la cabane</label>
            <select name="categories" id="categories">
                <option selected disabled>Choisissez une catégorie</option>
                <?php foreach ($categoriesList as $c) { ?>
                    <option value="<?= $c->id ?>" <?= $itemDetails->id_categories == $c->id ? 'selected' : '' ?>><?= $c->name ?></option>
                <?php } ?>
            </select>
            <?php if (isset($errors['categories'])) { ?>
                <p class="errors"><?= $errors['categories'] ?></p>
            <?php } ?>

            <label for="description">Description de la cabane</label>
            <textarea name="description" id="description"><?= $itemDetails->description ?></textarea>
            <?php if (isset($errors['description'])) { ?>
                <p class="errors"><?= $errors['description'] ?></p>
            <?php } ?>

            <input class="submit" type="submit" value="Modifier" name="updateItem">
        </form>
    </div>


    <!-- DELETE ITEM -->
    <div class="DivDelete">
        <div class="containerDelete">
            <h2>Supprimer la cabane</h2>

            <button class="submitDelete" id="openModalBtn">Supprimer</button>
        </div>
    </div>


    <!-- MODAL CONFIRMED DELETE ITEM -->
    <div id="modalContainer">
        <div id="modal">
            <span id="closeModalBtn">&times;</span>
            <p id="modalText">Êtes-vous sûr de vouloir supprimer la cabane ?</p>
            <form class="FormBtnDelete" action="/modifier-item-<?= $item->id ?>" method="POST">
                <button class="btnDelete" type="submit" name="delete">Supprimer</button>
            </form>
        </div>
    </div>

</section>