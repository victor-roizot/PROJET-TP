<?php

// Je crée mon tableau d'erreurs
// MESSAGES D'ERREUR
$errors = [];

//USERS

// lastname
define('USERS_LASTNAME_ERROR_EMPTY', 'Le nom d\'utilisateur est requis');
define('USERS_LASTNAME_ERROR_INVALID', 'Le nom d\'utilisateur est invalide. Il ne peut contenir que des lettres, des lettres accentuées, des espaces, des tirets et des apostrophes');

// firstname
define('USERS_FIRSTNAME_ERROR_EMPTY', 'Le prénom de l\'utilisateur est requis');
define('USERS_FIRSTNAME_ERROR_INVALID', 'Le prénom de l\'utilisateur est invalide. Il ne peut contenir que des lettres, des lettres accentuées, des espaces, des tirets et des apostrophes');

// address
define('USERS_ADDRESS_ERROR_EMPTY', 'L\'adresse de l\'utilisateur est requis');
define('USERS_ADDRESS_ERROR_INVALID', 'L\'adresse de l\'utilisateur est invalide. Il ne peut contenir que des lettres,des lettres accentuées, des chiffres, des espaces, et des tirets');
define('USERS_ADDRESS_ERROR_EXISTS', 'L\'adresse de l\'utilisateur existe déjà');

// zipCode
define('USERS_ZIPCODE_ERROR_EMPTY', 'Le code postal de l\'utilisateur est requis');
define('USERS_ZIPCODE_ERROR_INVALID', 'Le code postal de l\'utilisateur est invalide. Il ne peut contenir que des chiffres');
define('USERS_ZIPCODE_ERROR_EXISTS', 'Le code postal de l\'utilisateur existe déjà');

// city
define('USERS_CITY_ERROR_EMPTY', 'La ville de l\'utilisateur est requis');
define('USERS_CITY_ERROR_INVALID', 'La ville de l\'utilisateur est invalide. Il ne peut contenir que des lettres, des lettres accentuées, des espaces, des tirets et des apostrophes');
define('USERS_CITY_ERROR_EXISTS', 'La ville de l\'utilisateur existe déjà');

// phoneNumber
define('USERS_PHONENUMBER_ERROR_EMPTY', 'Le numéro de l\'utilisateur est requis');
define('USERS_PHONENUMBER_ERROR_INVALID', 'Le numéro de l\'utilisateur est invalide. Il ne peut contenir que des chiffres, et  des espaces entre un groupe de deux chiffres');
define('USERS_PHONENUMBER_ERROR_EXISTS', 'Le numéro de téléphone existe déjà');

// email
define('USERS_EMAIL_ERROR_EMPTY', 'L\'adresse email est requise');
define('USERS_EMAIL_ERROR_INVALID', 'L\'adresse email est invalide. Elle ne peut contenir que des lettres, des chiffres, des tirets, des underscores, des points et des arobases');
define('USERS_EMAIL_ERROR_EXISTS', 'L\'adresse email existe déjà');

// password
define('USERS_PASSWORD_ERROR_EMPTY', 'Le mot de passe est requis');
define('USERS_PASSWORD_ERROR_INVALID', 'Le mot de passe est invalide. Il doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial');

// password_confirm
define('USERS_PASSWORD_CONFIRM_ERROR_INVALID', 'La confirmation du mot de passe est invalide. Les mots de passe ne correspondent pas');
define('USERS_PASSWORD_CONFIRM_ERROR_EMPTY', 'La confirmation du mot de passe est requise');

// emailLogin
define('USERS_LOGIN_ERROR', 'Votre adresse mail ou votre mot de passe est incorrect');

// update
define('USERS_UPDATE_SUCCESS', 'Votre compte a bien été mis à jour');
define('USERS_UPDATE_ERROR', 'Une erreur est survenue lors de la mise à jour de votre compte');
define('USERS_PASSWORD_UPDATE_SUCCESS', 'Votre mot de passe a bien été mis à jour');
define('USERS_PASSWORD_UPDATE_ERROR', 'Une erreur est survenue lors de la mise à jour de votre mot de passe');


// ITEMS

// hut
define('ITEM_TITLE_ERROR_EMPTY', 'Le titre est requis');
define('ITEM_TITLE_ERROR_INVALID', 'Le titre est invalide. Il ne peut contenir que des lettres, des chiffres, des espaces, des tirets et des apostrophes');

// image
define('ITEM_IMAGE_ERROR_EMPTY', 'L\'image est requise');
define('ITEM_IMAGE_ERROR_INVALID', 'L\'image est invalide');
define('ITEM_IMAGE_ERROR_EXTENSION', 'L\'image est invalide. Elle doit être au format jpg, jpeg, png, gif ou webp');
define('ITEM_IMAGE_ERROR_SIZE', 'L\'image est invalide. Elle doit faire moins de 10Mo');
define('ITEM_IMAGE_ERROR', 'Une erreur est survenue lors de l\'envoi de l\'image');

// description
define('ITEM_DESCRIPTION_ERROR_EMPTY', 'Le contenu est requis');
define('ITEM_DESCRIPTION_ERROR_INVALID', 'Le contenu est invalide. Il ne peut pas contenir de balises script.');

// categories
define('CATEGORIES_ERROR_EMPTY', 'La catégorie est requise');
define('CATEGORIES_ERROR_INVALID', 'La catégorie est invalide');

// addItem
define('ITEM_ADD_SUCCESS', 'La cabane a bien été ajouté');
define('ITEM_ADD_ERROR', 'Une erreur est survenue lors de l\'ajout de la cabane');

// updateItem
define('ITEM_UPDATE_SUCCESS', 'Votre cabane a bien été mis à jour');
define('ITEM_UPDATE_ERROR', 'Une erreur est survenue lors de la mise à jour de votre cabane');
