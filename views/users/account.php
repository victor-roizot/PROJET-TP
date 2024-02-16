<!-- L'utilisateur pourra voir son profil -->
<section>
    <h1>Profil de :</h1>
    <div class="viewContainer">
        <div class="view">
            <h2><?= $userAccount->lastname ?></h2>
            <h2><?= $userAccount->firstname ?></h2>
            <p>Adresse : <?= $userAccount->address ?></p>
            <p>Code postal : <?= $userAccount->zipCode ?></p>
            <p>Ville : <?= $userAccount->city ?></p>
            <p>E-mail : <?= $userAccount->email ?></p>
            <p>Numéro : <?= $userAccount->phoneNumber ?></p>
            <p>Rôle : <?= $userAccount->roleName ?></p>
            <!-- L'utilisateur pourra modifier son profil par ce lien qui l'enverra vers updateAccount -->
            <a class=lienForm href="/modifier-mon-compte">Modifier mes informations</a>
        </div>
    </div>
</section>