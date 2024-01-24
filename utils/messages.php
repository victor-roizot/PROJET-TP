<?php

// Je crée mon tableau d'erreurs
// MESSAGES D'ERREUR

$errors = [];

// USERS

// LASTNAME
define('USERS_LASTNAME_ERROR_EMPTY', 'Le nom d\'utilisateur est requis');
define('USERS_LASTNAME_ERROR_INVALID', 'Le nom d\'utilisateur est invalide. Il ne peut contenir que des lettres, des lettres accentuées, des espaces, des tirets et des apostrophes');

// FIRSTNAME
define('USERS_FIRSTNAME_ERROR_EMPTY', 'Le prénom de l\'utilisateur est requis');
define('USERS_FIRSTNAME_ERROR_INVALID', 'Le prénom de l\'utilisateur est invalide. Il ne peut contenir que des lettres, des lettres accentuées, des espaces, des tirets et des apostrophes');

// ADDRESS
define('USERS_ADDRESS_ERROR_EMPTY', 'L\'adresse de l\'utilisateur est requis');
define('USERS_ADDRESS_ERROR_INVALID', 'L\'adresse de l\'utilisateur est invalide. Il ne peut contenir que des lettres,des chiffres, des espaces, des tirets et des lettres accentuées');
define('USERS_ADDRESS_ERROR_EXISTS', 'L\'adresse de l\'utilisateur existe déjà');

// ZIPCODE
define('USERS_ZIPCODE_ERROR_EMPTY', 'Le code postal de l\'utilisateur est requis');
define('USERS_ZIPCODE_ERROR_INVALID', 'Le code postal de l\'utilisateur est invalide. Il ne peut contenir que des chiffres');
define('USERS_ZIPCODE_ERROR_EXISTS', 'Le code postal de l\'utilisateur existe déjà');

// CITY
define('USERS_CITY_ERROR_EMPTY', 'La ville de l\'utilisateur est requis');
define('USERS_CITY_ERROR_INVALID', 'La ville de l\'utilisateur est invalide. Il ne peut contenir que des lettres,des chiffres, des espaces, des tirets et des lettres accentuées');
define('USERS_CITY_ERROR_EXISTS', 'La ville de l\'utilisateur existe déjà');

// PHONENUMBER
define('USERS_PHONENUMBER_ERROR_EMPTY', 'Le numéro de l\'utilisateur est requis');
define('USERS_PHONENUMBER_ERROR_INVALID', 'Le numéro de l\'utilisateur est invalide. Il ne peut contenir que des chiffres, des tirets et des caractères spéciaux');
define('USERS_PHONENUMBER_ERROR_EXISTS', 'Le numéro de téléphone existe déjà');

// MAIL
define('USERS_EMAIL_ERROR_EMPTY', 'L\'adresse email est requise');
define('USERS_EMAIL_ERROR_INVALID', 'L\'adresse email est invalide. Elle ne peut contenir que des lettres, des chiffres, des tirets, des underscores, des points et des arobases');
define('USERS_EMAIL_ERROR_EXISTS', 'L\'adresse email existe déjà');

// PASSWORD
define('USERS_PASSWORD_ERROR_EMPTY', 'Le mot de passe est requis');
define('USERS_PASSWORD_ERROR_INVALID', 'Le mot de passe est invalide. Il doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial');
define('USERS_PASSWORD_CONFIRM_ERROR_INVALID', 'La confirmation du mot de passe est invalide. Les mots de passe ne correspondent pas');
define('USERS_PASSWORD_CONFIRM_ERROR_EMPTY', 'La confirmation du mot de passe est requise');

// LOGIN
define('USERS_LOGIN_ERROR', 'Votre adresse mail ou votre mot de passe est incorrect');


// Birthdate
define('USERS_BIRTHDATE_ERROR_EMPTY', 'La date de naissance est requise');
define('USERS_BIRTHDATE_ERROR_INVALID', 'La date de naissance est invalide. Elle doit être au format YYYY-MM-DD');



// a verifier a partir d'ici
// Forms
define('USERS_UPDATE_SUCCESS', 'Votre compte a bien été mis à jour');
define('USERS_UPDATE_ERROR', 'Une erreur est survenue lors de la mise à jour de votre compte');

define('USERS_PASSWORD_UPDATE_SUCCESS', 'Votre mot de passe a bien été mis à jour');
define('USERS_PASSWORD_UPDATE_ERROR', 'Une erreur est survenue lors de la mise à jour de votre mot de passe');


// ARTICLES
// Title
define('ARTICLE_TITLE_ERROR_EMPTY', 'Le titre est requis');
define('ARTICLE_TITLE_ERROR_INVALID', 'Le titre est invalide. Il ne peut contenir que des lettres, des chiffres, des espaces, des tirets et des apostrophes');

// Content
define('ARTICLE_CONTENT_ERROR_EMPTY', 'Le contenu est requis');
define('ARTICLE_CONTENT_ERROR_INVALID', 'Le contenu est invalide. Il ne peut pas contenir de balises script.');

// Categories
define('ARTICLE_CATEGORIES_ERROR_EMPTY', 'La catégorie est requise');
define('ARTICLE_CATEGORIES_ERROR_INVALID', 'La catégorie est invalide');

// Image
define('ARTICLE_IMAGE_ERROR_EMPTY', 'L\'image est requise');
define('ARTICLE_IMAGE_ERROR_INVALID', 'L\'image est invalide');
define('ARTICLE_IMAGE_ERROR_EXTENSION', 'L\'image est invalide. Elle doit être au format jpg, jpeg, png, gif ou webp');
define('ARTICLE_IMAGE_ERROR_SIZE', 'L\'image est invalide. Elle doit faire moins de 1Mo');
define('ARTICLE_IMAGE_ERROR', 'Une erreur est survenue lors de l\'envoi de l\'image');

//Form
define('ARTICLE_ADD_SUCCESS', 'L\'article a bien été ajouté');
define('ARTICLE_ADD_ERROR', 'Une erreur est survenue lors de l\'ajout de l\'article');