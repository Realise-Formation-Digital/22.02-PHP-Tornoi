<?php
require_once __DIR__ . "/Database.php";

class tournoiModel extends Database
{
  public $id;
  public $nom;
  public $date;
  public $heure_debut;
  public $heure_fin;
  public $lieu;

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getAlltournois($offset = 0, $limit = 10)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getMany(
      "SELECT * FROM tournois ORDER BY nom ASC LIMIT $offset, $limit",
      "tournoiModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getSingletournoi($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getSingle(
      "SELECT * FROM tournois WHERE id = $id",
      "tournoiModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function inserttournoi($array)
  {
    // ---- TODO : Commenter ce bout de code ----
    $keys = implode(", ", array_keys($array));
    $values = implode("', '", array_values($array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->insert(
      "INSERT INTO tournois ($keys) VALUES ('$values')",
      "tournoiModel",
      "SELECT * FROM tournois"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function updatetournoi($array, $id)
  {
    // ---- TODO : Commenter ce bout de code ----
    $values_array = [];
    foreach($array as $key => $value) {
      $values_array[] = "$key = '$value'";
    }
    $values = implode(",", array_values($values_array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->update(
      "UPDATE tournois SET $values WHERE id = $id",
      "tournoiModel",
      "SELECT id FROM tournois WHERE id=$id",
      "SELECT * FROM tournois WHERE id=$id"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function deletetournoi($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->delete(
      "DELETE FROM tournois WHERE id=$id",
      "SELECT id FROM tournois WHERE id=$id"
    );
  }

}
