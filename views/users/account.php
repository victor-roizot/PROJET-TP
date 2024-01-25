<h1>Profil de <?= $userAccount->lastname ?></h1>
<h1><?= $userAccount->firstname ?></h1>
<p>Adresse : <?= $userAccount->address ?></p>
<p>Code postal : <?= $userAccount->zipCode ?></p>
<p>Ville : <?= $userAccount->city ?></p>
<p>E-mail : <?= $userAccount->email ?></p>
<p>Numéro : <?= $userAccount->phoneNumber ?></p>
<p>Rôle : <?= $userAccount->roleName ?></p>
<a class=lien href="/modifier-mon-compte">Modifier mes informations</a>