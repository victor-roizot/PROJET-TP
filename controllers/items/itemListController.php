<?php
// Requires vues
require_once '../../models/itemsModel.php';

// Démarrage de la session
session_start();

// récupère la classe Items (cabanes)
$item = new Items();

// Récupère la  liste de tous les items 
$itemsList = $item->getList();

require_once '../../views/parts/header.php';
require_once '../../views/items/itemList.php';
require_once '../../views/parts/footer.php';