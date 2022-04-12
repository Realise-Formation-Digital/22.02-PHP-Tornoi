<?php
    require_once __DIR__ . "/Database.php";

    class JoueurModel extends Database {

        public $id;
        public $nom;
        public $age;
        public $nationalité;
        public $equipe_id;

        /**
         * ---- Montre tous les joueurs, un maximum de 10 ----
         */
        public function getAllJoueur($offset = 0, $limit = 10) {
            // ---- Montre tous les joueurs par nom et maximum 10 ----
            return $this->getMany(
                "SELECT * FROM joueur ORDER BY nom ASC LIMIT $offset, $limit",
                "JoueurModel"
            );
        }

        /**
         * ---- Montre un seul joueur, selectionné par id ----
         */
        public function getSingleJoueur($id) {
            // ---- Montre un seul joueur par son id ----
            return $this->getSingle(
                "SELECT * FROM joueur WHERE id = $id",
                "JoueurModel"
            );
        }

        /**
         * ---- Inserer un joueur ----
         */
        public function insertJoueur($array) {
            // ---- Donne forme a l'array donné dans les parametres ----
            $keys = implode(", ", array_keys($array));
            $values = implode("', '", array_values($array));

            // ---- Insere une nouvelle ligne avec la key/values donnée dans l'array  ----
            return $this->insert(
                "INSERT INTO joueur ($keys) VALUES ('$values')",
                "JoueurModel",
                "SELECT * FROM joueur"
            );
        }

        /**
         * ---- Modifier un joueur, declare son id et une array (valeur des colonne a modifie) ----
         */
        public function updateJoueur($array, $id) {
            // ---- Declare un array, pour chaque cle dans l'array il prend ça valeur puis il les separe par ","  ----
            $values_array = [];
            foreach($array as $key => $value) {
                $values_array[] = "$key = '$value'";
            }
            $values = implode(",", array_values($values_array));

            // ---- Modifie un joueuer selectionné par son id ----
            return $this->update(
                "UPDATE joueur SET $values WHERE id = $id",
                "JoueurModel",
                "SELECT id FROM joueur WHERE id=$id",
                "SELECT * FROM joueur WHERE id=$id"
            );
        }

        /**
         * ---- Elimine un joueur par son id ----
         */
        public function deleteJoueur($id) {
            // ---- Elimine un joueur par son id ----
            return $this->delete(
                "DELETE FROM joueur WHERE id=$id",
                "SELECT id FROM joueur WHERE id=$id"
            );
        }
        // -----Liste les noms des equipes avec entraineur + logo, joueur et leurs age + nationalité par ordre alphabethique--
        public function getTeamate($offset, $limit) {

            return $this->getMany(
                "SELECT equipe.id, equipe.nom, equipe.entraineur, equipe.logo, joueur.nom, joueur.age, joueur.nationalité
                FROM equipe
                INNER JOIN joueur
                ON joueur.equipe_id = equipe.id
                ORDER BY equipe.nom ASC LIMIT $offset, $limit",
                "JoueurModel"
            );
        }
    }