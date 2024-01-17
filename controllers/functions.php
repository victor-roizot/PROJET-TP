<?php
//FONCTIONS
/**
 * Nettoie la chaîne de caractères
 * @param string $string La chaîne à nettoyer
 * @return string La chaîne nettoyée
 */
function clean($string)
{
    $string = trim($string);
    //Supprime les espaces ou d'autres caractères en début et fin de chaîne
    $string = strip_tags($string);
    return $string;
}

/**
 * Fonction qui permet de vérifier la validité d'une date
 * @param string $date - La date à vérifier (au format mysql)
 * @return bool - true si la date est valide, false sinon
 */

/**
 * function checkDateValidity($date) {
 * $dateArray = explode('-', $date);
 * return checkdate($dateArray[1], $dateArray[2], $dateArray[0]);
 * }
 */
