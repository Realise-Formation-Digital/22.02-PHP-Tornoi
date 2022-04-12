<?php
require_once __DIR__ . "/Databasemodel.php";

class JoueursModel extends Database
{
  public $id;
  public $nom;
  public $ages;
  public $nationalite;
  

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getAllJoueurs($offset = 0, $limit = 10)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getMany(
      "SELECT * FROM joueurs ORDER BY nom ASC LIMIT $offset, $limit",
      "JoueursModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getSingleJoueurs($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getSingle(
      "SELECT * FROM joueurs WHERE id = $id",
      "JoueursModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function insertJoueurs($array)
  {
    // ---- TODO : Commenter ce bout de code ----
    $keys = implode(", ", array_keys($array));
    $values = implode("', '", array_values($array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->insert(
      "INSERT INTO joueurs ($keys) VALUES ('$values')",
      "JoueursModel",
      "SELECT * FROM joueurs"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function updateJoueurs($array, $id)
  {
    // ---- TODO : Commenter ce bout de code ----
    $values_array = [];
    foreach($array as $key => $value) {
      $values_array[] = "$key = '$value'";
    }
    $values = implode(",", array_values($values_array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->update(
      "UPDATE joueurs SET $values WHERE id = $id",
      "JoueursModel",
      "SELECT id FROM joueurs WHERE id=$id",
      "SELECT * FROM joueurs WHERE id=$id"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function deleteJoueurs($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->delete(
      "DELETE FROM joueurs WHERE id=$id",
      "SELECT id FROM joueurs WHERE id=$id"
    );
  }

}
