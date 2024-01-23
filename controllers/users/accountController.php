<?php
// Requires
require_once '../../models/usersModel.php';
require_once '../../utils/messages.php';
require_once '../../utils/regex.php';
require_once '../../utils/functions.php';

// Démarrage de la session
session_start();

// Vérification si l'utilisateur est connecté
if(empty($_SESSION['user'])){
    header('Location: /connexion');
    exit;
}

// Affichage du profil des utilisateurs
$user = new Users;
$user->id = $_SESSION['user']['id'];
$userAccount = $user->getById();

// Requires des vues
require_once '../../views/parts/header.php';
require_once '../../views/users/account.php';
require_once '../../views/parts/footer.php';