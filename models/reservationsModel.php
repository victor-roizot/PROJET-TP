<?php

/** Users est une classe.
 * Je cree le users avec des attributs 
 **/
class Reservations
{
    public int $id;
    public string $startingDate;
    public string $endingDate;
    public int $personsNumber;
    public string $lunch;
    public string $condition;
    public int $id_items;
    public int $id_users;
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
            header('Location: /accueil');
        }
    }
    /**
     * Ajoute d'une réservation dans la base de données.
     * @param string $startingDate date de debut de la réservation.
     * @param string $endingDate date de fin de la réservation.
     * @param int $personsNumber nombre de personne.
     * @param string $lunch validation panier repas
     * @param string $condition validation condition de location.
     * @param int $id_items L' id de la cabane.
     * @param int $id_users L' id de l'utilisateur.
     * @return bool
     */
    public function create()
    {
        $sql = 'INSERT INTO `HuBX02_reservations` (`startingDate`, `endingDate`, `personsNumber`, `lunch`, `condition`, `id_items`, `id_users`)
        VALUES (:startingDate, :startingDate, :personsNumber, :lunch, :condition, :id_items :id_users)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':startingDate', $this->startingDate, PDO::PARAM_STR);
        $req->bindValue(':endingDate', $this->endingDate, PDO::PARAM_STR);
        $req->bindValue(':personsNumber', $this->personsNumber, PDO::PARAM_INT);
        $req->bindValue(':lunch', $this->lunch, PDO::PARAM_STR);
        $req->bindValue(':condition', $this->condition, PDO::PARAM_STR);
        $req->bindValue(':id_items', $this->id_items, PDO::PARAM_INT);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        return $req->execute();
    }

    /** requete test dans PHP MySQL
     * INSERT INTO `HuBX02_reservations` (`startingDate`, `endingDate`, `personsNumber`, `lunch`, `condition`, `id_items`, `id_users`)
     *         VALUES ('2024-09-24', '2024-09-30', 3, 'true', 'true', 28, 18);
     */

}
