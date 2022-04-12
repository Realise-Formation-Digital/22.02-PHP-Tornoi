<?php 
    require_once __DIR__ . "/Database.php";

    class EquipeModel extends Database {

        public $id;
        public $nom;
        public $entraineur;
        public $logo;
        public $tournoi;

        public function getAllEquipe($offset = 0, $limit = 10) {
            // ---- Montre tous les équipes par nom et maximum 10 ----
            return $this->getMany(
                "SELECT * FROM equipe ORDER BY nom ASC LIMIT $offset, $limit",
                "EquipeModel"
            );
        }

        public function getSingleEquipe($id) {
            // ---- Montre une seule equipe par son id ----
            return $this->getSingle(
                "SELECT * FROM equipe WHERE id = $id",
                "EquipeModel"
            );
        }

        /**
         * ---- Inserer une equipe ----
         */
        public function insertEquipe($array) {
            // ---- TODO : Donne une forme a l'array ----
            $keys = implode(", ", array_keys($array));
            $values = implode("', '", array_values($array));

            // ---- TODO : Insere une nouvelle ligne avec le key/values donne dans l'array  ----
            return $this->insert(
                "INSERT INTO equipe ($keys) VALUES ('$values')",
                "EquipeModel",
                "SELECT * FROM equipe"
            );
        }

        /**
         * ---- TODO : Modifier une equipe, declare son id et une array (valeur des colonne a modifie) ----
         */
        public function updateEquipe($array, $id) {
            // ---- TODO : Declare un array, pour chaque cle dans l'array il prend ça valeur puis il les separe par ","  ----
            $values_array = [];
            foreach($array as $key => $value) {
                $values_array[] = "$key = '$value'";
            }
            $values = implode(",", array_values($values_array));

            // ---- TODO : Modifie une equipe selectionner par son id ----
            return $this->update(
                "UPDATE equipe SET $values WHERE id = $id",
                "EquipeModel",
                "SELECT id FROM equipe WHERE id=$id",
                "SELECT * FROM equipe WHERE id=$id"
            );
        }

        /**
         * ---- TODO : Elimine une equipe par son id ----
         */
        public function deleteEquipe($id) {
            // ---- Elimine une equipe par son id ----
            return $this->delete(
                "DELETE FROM equipe WHERE id=$id",
                "SELECT id FROM equipe WHERE id=$id"
            );
        }

        public function getentraineurs(){
            return $this->getMany(
                "SELECT equipe.id, equipe.nom, equipe.entraineur, equipe.logo, joueur.nom, joueur.age, joueur.nationalité
                FROM equipe
                INNER JOIN joueur
                ON joueur.equipe_id = equipe.id
                ORDER BY equipe.nom ASC",
                "EquipeModel"
            );
        }

        public function getequipeTournoi(){
            return $this->getMany(
                "SELECT equipe.id, equipe.nom, equipe.entraineur, equipe.logo, tournoi.nom as tournoi
                FROM equipe
                INNER JOIN equipe_tournoi
                ON equipe_tournoi.equipe_id = equipe.id
                INNER JOIN tournoi
                ON tournoi.id = equipe_tournoi.tournoi_id
                WHERE equipe.id = equipe_tournoi.equipe_id",
                "EquipeModel"
            );
        }

    }