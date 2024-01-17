<?php
require_once '../../models/usersModel.php';
require_once '../errors/regex-errors_users.php';
require_once '../functions.php';

session_start();

if(!isset($_SESSION['user'])) {
    header('Location: /connexion');
    exit;
}
