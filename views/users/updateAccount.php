<!-- L'utilisateur modifiera ou  supprimera son compte  par ce formulaire -->
<section>

    <?php if (isset($success)) { ?>
        <p class="success"><?= $success ?></p>
    <?php } ?>


    <!-- UPDATE ADDRESS -->
    <?php if (isset($errors['updateAddress'])) { ?>
        <p class="errors"><?= $errors['updateAddress'] ?></p>
    <?php } ?>
    <div class="formContainer">
        <form class="form" action="/modifier-mon-compte" method="post">
            <h2>Modifier mon adresse</h2>
            <label for="address">Adresse</label>
            <input type="text" name="address" id="address" value="<?= $userAccount->address ?>">
            <?php if (isset($errors['address'])) { ?>
                <p class="errors"><?= $errors['address'] ?></p>
            <?php } ?>

            <label for="zipCode">Code postal</label>
            <input type="text" name="zipCode" id="zipCode" value="<?= $userAccount->zipCode ?>">
            <?php if (isset($errors['zipCode'])) { ?>
                <p class="errors"><?= $errors['zipCode'] ?></p>
            <?php } ?>

            <label for="city">Ville</label>
            <input class="upsubmitbtn" type="text" name="city" id="city" value="<?= $userAccount->city ?>">
            <?php if (isset($errors['city'])) { ?>
                <p class="errors"><?= $errors['city'] ?></p>
            <?php } ?>

            <input class="submit" type="submit" value="Modifier" name="updateAddress">
        </form>
    </div>


    <!-- UPDATE PHONENUMBER -->
    <?php if (isset($errors['updatePhoneNumber'])) { ?>
        <p class="errors"><?= $errors['updatePhoneNumber'] ?></p>
    <?php } ?>
    <div class="formContainer">
        <form class="form" action="/modifier-mon-compte" method="post">
            <h2>Modifier mon numéro</h2>
            <label for="phoneNumber">Numéro</label>
            <input class="upsubmitbtn" type="text" name="phoneNumber" value="<?= $userAccount->phoneNumber ?>">
            <?php if (isset($errors['phoneNumber'])) { ?>
                <p class="errors"><?= $errors['phoneNumber'] ?></p>
            <?php } ?>

            <input class="submit" type="submit" value="Modifier" name="updatePhoneNumber">
        </form>
    </div>


    <!-- UPDATE EMAIL -->
    <?php if (isset($errors['updateEmail'])) { ?>
        <p class="errors"><?= $errors['updateEmail'] ?></p>
    <?php } ?>
    <div class="formContainer">
        <form class="form" action="/modifier-mon-compte" method="post">
            <h2>Modifier mon email</h2>
            <label for="email">Email</label>
            <input class="upsubmitbtn" type="text" name="email" value="<?= $userAccount->email ?>">
            <?php if (isset($errors['email'])) { ?>
                <p class="errors"><?= $errors['email'] ?></p>
            <?php } ?>

            <input class="submit" type="submit" value="Modifier" name="updateEmail">
        </form>
    </div>

    <!-- UPDATE PASSWORD -->
    <?php if (isset($errors['updatePassword'])) { ?>
        <p class="errors"><?= $errors['updatePassword'] ?></p>
    <?php } ?>

    <div class="formContainer">
        <form class="form" action="/modifier-mon-compte" method="POST">
            <h2>Modifier mon mot de passe</h2>

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Azerty456!">
            <?php if (isset($errors['password'])) { ?>
                <p class="errors"><?= $errors['password'] ?></p>
            <?php } ?>

            <label for="password_confirm">Confirmation du mot de passe</label>
            <input class="upsubmitbtn" type="password" name="password_confirm" id="password_confirm" placeholder="Azerty456!">
            <?php if (isset($errors['password_confirm'])) { ?>
                <p class="errors"><?= $errors['password_confirm'] ?></p>
            <?php } ?>
            <input class="submit" type="submit" value="Modifier" name="updatePassword">
        </form>
    </div>

    <!-- DELETE ACCOUNT -->
    <div class="DivDelete">
        <div class="containerDelete">
            <h2>Supprimer mon compte</h2>
            <button class="submitDelete" id="openModalBtn">Supprimer</button>
        </div>
    </div>

    <!-- MODAL CONFIRMED DELETE ACCOUNT -->
    <div id="modalContainer">
        <div id="modal">
            <span id="closeModalBtn">&times;</span>
            <p id="modalText">Êtes-vous sûr de vouloir supprimer votre compte ?</p>
            <form class="FormBtnDelete" action="/modifier-mon-compte" method="POST">
                <button class="btnDelete" type="submit" name="deleteAccount">Supprimer</button>
            </form>
        </div>
    </div>
</section>