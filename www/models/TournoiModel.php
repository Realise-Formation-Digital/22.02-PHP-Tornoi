<?php

    require_once __DIR__ . "/Database.php";

    class TournoiModel extends Database {

        public $id;
        public $nom;
        public $date;
        public $heure_debut;
        public $heure_fun;
        public $lieu;

        public function getAllTournoi($offset = 0, $limit = 10) {
            // ---- Montre tous les tournois par nom et maximum 10 ----
            return $this->getMany(
                "SELECT * FROM tournoi ORDER BY nom ASC LIMIT $offset, $limit",
                "TournoiModel"
            );
        }

        public function getSingleTournoi($id) {
            // ---- Montre un seul tournoi par son id ----
            return $this->getSingle(
                "SELECT * FROM tournoi WHERE id = $id",
                "TournoiModel"
            );
        }

        /**
         * ---- Inserer un tournoi ----
         */
        public function insertTournoi($array) {
            // ---- Donne forme a l'array donnee dans les parametre ----
            $keys = implode(", ", array_keys($array));
            $values = implode("', '", array_values($array));

            // ---- Insere une nouvelle ligne avec le key/values donne dans l'array  ----
            return $this->insert(
                "INSERT INTO tournoi ($keys) VALUES ('$values')",
                "TournoiModel",
                "SELECT * FROM tournoi"
            );
        }

        /**
         * ---- Modifier un tournoi, declare son id et une array (valeur des colonne a modifie) ----
         */
        public function updateTournoi($array, $id) {
            // ---- Declare un array, pour chaque cle dans l'array il prend la valeur puis il les separes par ","  ----
            $values_array = [];
            foreach($array as $key => $value) {
                $values_array[] = "$key = '$value'";
            }
            $values = implode(",", array_values($values_array));

            // ---- Modifie le tournoi selectionné par son id ----
            return $this->update(
                "UPDATE tournoi SET $values WHERE id = $id",
                "TournoiModel",
                "SELECT id FROM tournoi WHERE id=$id",
                "SELECT * FROM tournoi WHERE id=$id"
            );
        }

        /**
         * ---- Elimine un tournoi par son id ----
         */
        public function deleteTournoi($id) {
            // ---- Elimine un tournoi par son id ----
            return $this->delete(
                "DELETE FROM tournoi WHERE id=$id",
                "SELECT id FROM tournoi WHERE id=$id"
            );
        }
    }