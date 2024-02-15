<!-- L'utilisateur se connectera  par ce formulaire -->
<section>
    <h1>Connexion</h1>
    <div class="formContainer">
        <form action="#" method="POST">
            <label for="email">Adresse mail</label>
            <input type="email" name="email" id="email" placeholder="jean.dupont@gmail.fr" value="<?= @$_COOKIE['email'] ?>">
            <?php if (isset($errors['email'])) { ?>
                <p class="errorsMessage"><?= $errors['email'] ?></p>
            <?php } ?>

            <label for="password">Mot de passe</label>
            <input class="upsubmitbtn" type="password" name="password" id="password" placeholder="Azerty123!" value="<?= @$_COOKIE['password'] ?>">
            <?php if (isset($errors['password'])) { ?>
                <p class="errorsMessage"><?= $errors['password'] ?></p>
            <?php } ?>
            <div>
                <input type="checkbox" name="remember" id="remember"><label for="remember">Se souvenir de moi</label>
            </div>
            <input class="submit" type="submit" value="Se connecter">
        </form>
    </div>
</section>