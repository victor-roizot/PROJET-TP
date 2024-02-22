<?php

// Démarrage de la session
session_start();

// Requires des vues dont celui d'erreur.
require_once '../views/parts/header.php';
require_once '../views/errors/databaseError.php';
require_once '../views/parts/footer.php';