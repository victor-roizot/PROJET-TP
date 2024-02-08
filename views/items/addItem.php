<!-- L'utilisateur administrateur créera les cabanes a loué par ce formulaire -->
<?php if(isset($success)) { ?>
    <p><?= $success ?></p>
<?php } else if(isset($errors['itemAdd'])){ ?>
    <p><?= $errors['itemAdd'] ?></p>
<?php } ?>

<div>
    <form action="/ajout-item" method="POST" enctype="multipart/form-data">
        <h1>Ajouter une cabane</h1>
        <label for="hut">Titre</label>
        <input type="text" name="hut" id="hut">
        <?php if (isset($errors['hut'])) { ?>
            <p><?= $errors['hut'] ?></p>
        <?php } ?>

        <label for="image">Image de la cabane</label>
        <input type="file" name="image" id="image">
        <?php if (isset($errors['image'])) { ?>
            <p><?= $errors['image'] ?></p>
        <?php } ?>

        <label for="categories">Catégorie</label>
        <select name="categories" id="categories">
            <option selected disabled>Choisissez une catégorie</option>
            <?php foreach ($categoriesList as $c) { ?>
                <option value="<?= $c->id ?>"><?= $c->name ?></option>
            <?php } ?>
        </select>
        <?php if (isset($errors['categories'])) { ?>
            <p><?= $errors['categories'] ?></p>
        <?php } ?>

        <label for="description">Description de la cabane</label>
        <textarea name="description" id="description"></textarea>
        <?php if (isset($errors['description'])) { ?>
            <p><?= $errors['description'] ?></p>
        <?php } ?>

        <input type="submit" value="Créer">

    </form>
</div>