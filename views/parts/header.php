<!DOCTYPE html>
<!-- ici sera la partie visible du header -->
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabin Escapes</title>
    <link rel="shortcut icon" href="../../assets/img/logo_cabin_escapes.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">

    <!--<script src="https://cdn.tiny.cloud/1/802nxm0o8zeejebmjzdtlfkaz62n2sdyg3af8osc5o65c7sm/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#description'
        });
    </script>-->
    <script src="https://kit.fontawesome.com/f0d3df2a54.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <a href="/accueil"><img id="logo" src="../../assets/img/logo_cabin_escapes.png" alt="Logo"></a>
        
        <ul class="navbar-desktop">
            <li><a href="/accueil" class=lien>Accueil</a></li>
            <li><a href="/list-cabane" class=lien>Cabanes</a></li>
            <?php if (empty($_SESSION['user'])) { ?>
                <li><a href="/inscription" class=lien>Inscription</a></li>
                <li><a href="/connexion" class=lien>Connexion</a></li>
            <?php } else { ?>
                <li><a href="/mon-compte" class="lien"><?= $_SESSION['user']['lastname'] ?></a></li>
                <!-- l'utilisateur aura accès à dashboard  uniquement s'il est administrateur -->
                <?php if ($_SESSION['user']['id_usersRoles'] == 255) { ?>
                    <li><a href="/dashboard" class=lien>Admin</a></li>
                <?php } ?>
                <li><a href="/deconnexion" class=lien>Déconnexion</a></li>
            <?php } ?>
        </ul>

        <div class="navbar-mobile">
            <i class="fas fa-bars"></i>
            <div class="modal">
                <ul class="navbar-mobile-list">
                    <li><a href="/accueil" class=lien>Accueil</a></li>
                    <li><a href="/list-cabane" class=lien>Cabanes</a></li>
                    <?php if (empty($_SESSION['user'])) { ?>
                        <li><a href="/inscription" class=lien>Inscription</a></li>
                        <li><a href="/connexion" class=lien>Connexion</a></li>
                    <?php } else { ?>
                        <li><a href="/mon-compte" class="lien"><?= $_SESSION['user']['lastname'] ?></a></li>
                        <!-- l'utilisateur aura accès à dashboard  uniquement s'il est administrateur -->
                        <?php if ($_SESSION['user']['id_usersRoles'] == 255) { ?>
                            <li><a href="/dashboard" class=lien>Admin</a></li>
                        <?php } ?>
                        <li><a href="/deconnexion" class=lien>Déconnexion</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>


    </nav>
    <main>