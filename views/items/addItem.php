<!-- L'utilisateur administrateur créera les cabanes à louer par ce formulaire -->
<section>
    <h1>Ajouter une cabane</h1>

    <?php if (isset($success)) { ?>
        <p class="success"><?= $success ?></p>
        <!--Vérification des erreurs liées à l'ajout des cabanes -->
    <?php } else if (isset($errors['itemAdd'])) { ?>
        <p class="errors"><?= $errors['itemAdd'] ?></p>
    <?php } ?>

    <div class="formContainer">
        <form class="form" action="/ajout-item" method="POST" enctype="multipart/form-data">

            <label for="image">Image de la cabane</label>
            <input type="file" name="image" id="image">
            <?php if (isset($errors['image'])) { ?>
                <p class="errors"><?= $errors['image'] ?></p>
            <?php } ?>

            <label for="hut">Nom de la cabane</label>
            <input type="text" name="hut" id="hut">
            <?php if (isset($errors['hut'])) { ?>
                <p class="errors"><?= $errors['hut'] ?></p>
            <?php } ?>

            <label for="categories">Catégorie de la cabane</label>
            <select name="categories" id="categories">
                <option selected disabled>Choisissez une catégorie</option>
                <?php foreach ($categoriesList as $c) { ?>
                    <option value="<?= $c->id ?>"><?= $c->name ?></option>
                <?php } ?>
            </select>
            <?php if (isset($errors['categories'])) { ?>
                <p class="errors"><?= $errors['categories'] ?></p>
            <?php } ?>

            <label for="description">Description de la cabane</label>
            <textarea name="description" id="description"></textarea>
            <?php if (isset($errors['description'])) { ?>
                <p class="errors"><?= $errors['description'] ?></p>
            <?php } ?><br>

            <input class="submit" type="submit" value="Créer">

        </form>
    </div>
</section>