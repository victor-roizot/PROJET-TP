<?php
session_start();
if(empty($_SESSION['user'])){
    header('Location: /connexion');
    exit;
}
/**
 * Ici je contrôle que l'utilisateur a le bon rôle pour accéder à la page car seul les administrateurs peuvent y accéder.
 * J'utilise la variable $_SESSION['user']['role'] qui a été créée lors de la connexion.
 * S'il n'a pas accès à cette page, je renvoie l'utilisateur vers sa page de profil.
 */
if($_SESSION['user']['id_usersRoles'] != 255){
    header('Location: /mon-compte');
    exit;
}

//Les 3 require des vues ou parties de vue sont inséparables et toujours à la fin parce que c'est l'affichage du résultat final des actions du contrôleur

require_once '../../views/parts/header.php';
require_once '../../views/users/admin.php';
require_once '../../views/parts/footer.php';





