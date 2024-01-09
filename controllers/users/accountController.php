<?php

session_start();

if(empty($_SESSION['user'])){
    header('Location: /connexion');
    exit;
}

require_once '../../views/parts/header.php';
require_once '../../views/users/account.php';
require_once '../../views/parts/footer.php';