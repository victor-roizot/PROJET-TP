<?php

/** categories est une classe.
 * Je cree la categories avec des attributs 
 **/
class categories
{
    public int $id;
    public string $name;
    private $pdo;

    /** construct est une  methode.
     * Il est appelé automatiquement lorsqu'on instancie la classe.
     * Il permet de lancer une action automatiquement lorsqu'on instancie la classe
     *
     **/
    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=projet_tp;charset=utf8', 'Neo512Mo', '26qJq2Sqb=28C[');
        } catch (PDOException $e) {
            header('Location: /erreur-connexion');
            exit;
        }
    }


    /**
     *  public function est une méthodes de la classe (fonction rattachée à une classe).
     * 
     * Vérifie si une catégorie existe par son id
     * @param int $id - L'id de la catégorie à vérifier
     * @return int - 1 si la catégorie existe,  0 ou si elle n'existe pas
     */
    public function checkIfExistsById()
    {
        $sql = 'SELECT COUNT(`id`) FROM `hubx02_categories` WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }
    /** requete test dans PHP MySQL
     *SELECT COUNT(`id`) FROM `hubx02_categories` WHERE `id` = 1;
     */

    

     // a continuer 
     
    /**
     * Récupère la  liste de toute les catégories dans la base de données
     * @param int $id L'id de la catégorie
     * @return object
     */
    public function getList()
    {
        $sql = 'SELECT `id`,`name` FROM `hubx02_categories`';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
    /** requete test dans PHP MySQL
     * SELECT `id`,`name` FROM `hubx02_categories`;
     */
}
