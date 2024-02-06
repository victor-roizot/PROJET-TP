<?php

/** Items est une classe.
 * Je cree l'Items avec des attributs 
 **/
class Items
{
    public int $id;
    public string $hut;
    public string $image;
    public string $description;
    public int $id_categories;
    private $pdo;

    /** construct est une  methode.
     * Il est appelé automatiquement lorsqu'on instancie la classe.
     * Il permet de lancer une action automatiquement lorsqu'on instancie la classe
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
     * Ajoute un item (cabane a loué) dans la base de données
     * @param string $hut Le titre de la cabane
     * @param string $image L'image de la cabane
     * @param string $description La description de la cabane
     * @param int $id_categories L' id de la catégorie
     * @return bool
     */
    public function create()
    {
        $sql = 'INSERT INTO `hubx02_items` (`hut`, `image`, `description`, `id_categories`)
        VALUES (:hut, :image, :description, :id_categories)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':hut', $this->hut, PDO::PARAM_STR);
        $req->bindValue(':image', $this->image, PDO::PARAM_STR);
        $req->bindValue(':description', $this->description, PDO::PARAM_STR);
        $req->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        return $req->execute();
    }
    /** requete test dans PHP MySQL
     * INSERT INTO `hubx02_items` (`hut`, `image`, `description`, `id_categories`)
     *     VALUES ('cabane test', 'image de la cabane', 'Ceci est un la 1er cabane test ajouter pour être loué ', 2);
     */


    /**
     * Récupère la liste de tous les Items
     * @return array
     */
    public function getList()
    {
        $sql = 'SELECT `a`.`id`,`title`, SUBSTR(`content`, 1, 500) AS `content`, DATE_FORMAT(`publicationDate`, "le %d/%m/%Y à %Hh%i") AS `publicationDateFr`,DATE_FORMAT(`updateDate`, "le %d/%m/%Y à %Hh%i") AS `updateDateFr`,`image`, `username`, `name` AS `category`
        FROM `pab7o_Items` AS `a`
        INNER JOIN `pab7o_users` AS `u` ON `id_users` = `u`.`id`
        INNER JOIN `pab7o_Itemscategories` AS `c` ON `id_ItemsCategories` = `c`.`id`
        ORDER BY `publicationDate` DESC';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Récupère un item par un son id
     * @param int $id Id de l'article
     * @return object 
     */
    public function getById()
    {
        $sql = 'SELECT `title`, `content`, DATE_FORMAT(`publicationDate`, "le %d/%m/%Y à %Hh%i") AS `publicationDateFr`, DATE_FORMAT(`updateDate`, "le %d/%m/%Y à %Hh%i") AS `updateDateFr`,`image`, `username`, `name` AS `category`
        FROM `pab7o_Items` AS `a`
        INNER JOIN `pab7o_users` AS `u` ON `id_users` = `u`.`id`
        INNER JOIN `pab7o_Itemscategories` AS `c` ON `id_ItemsCategories` = `c`.`id`
        WHERE `a`.`id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function checkIfExists()
    {
        $sql = 'SELECT COUNT(*) FROM `pab7o_Items` WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }
}
