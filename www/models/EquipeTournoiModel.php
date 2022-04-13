<?php 
    require_once __DIR__ . "/Database.php";

    class EquipeTournoiModel extends Database {

        public $equipe_id;
        public $tournoi_id;
        public $id;

        /**
         * ---- TODO : Inserer une equipe ----
         */
        public function insertEquipeTournoi($equipe_id, $tournoi_id) {
          
            // ---- TODO : Insere une nouvelle ligne avec le key/values donne dans l'array  ----
            $this->addRelation('equipe_tournoi', 'equipe_id', 'tournoi_id', $equipe_id, $tournoi_id);

            return $this->getSingle("SELECT * FROM equipe_tournoi");
            
        }

        /**
         * ---- TODO : Elimine une equipe par son id ----
         */
        public function deleteEquipeTournoi($equipe_id, $tournoi_id) {
            
            return $this->removeRelation('equipe_tournoi', 'equipe_id', 'tournoi_id', $equipe_id, $tournoi_id);

            return $this->getSingle("SELECT * FROM equipe_tournoi");
        }
    }
    