<?php
// Requires vues
require_once '../../models/itemsModel.php';


// Démarrage de la session
session_start();

// récupère la classe Items (cabanes)
$item = new Items();

// récupère le id  par le URL
$item->id = $_GET['id'];

// vérifie s'il existe sinon renvoie vers les cabanes
if ($item->checkIfExists() == 0) {
    header('Location: /list-cabanes');
    exit;
}

// Récupère les informations du item par son id
$itemDetails = $item->getById();


// Requires vues
require_once '../../views/parts/header.php';
require_once '../../views/items/viewItem.php';
require_once '../../views/parts/footer.php';
