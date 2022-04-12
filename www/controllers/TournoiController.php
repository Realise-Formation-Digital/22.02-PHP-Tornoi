<?php

<<<<<<< Updated upstream
    require_once __DIR__ . "/../models/TournoiModel.php";

    class TournoiController extends BaseController {

        public function getList() {
            try {
                $tournoiModel = new TournoiModel();
        
                $limit = 10;
                $urlParams = $this->getQueryStringParams();
                if (isset($urlParams['limit']) && is_numeric($urlParams['limit'])) {
                    $limit = $urlParams['limit'];
                }
        
                $offset = 0;
                $urlParams = $this->getQueryStringParams();
                if (isset($urlParams['page']) && is_numeric($urlParams['page']) && $urlParams['page'] > 0) {
                    $offset = ($urlParams['page'] - 1) * $limit;
                }
                
                $tournoi = $tournoiModel->getAllTournoi($offset, $limit);
        
                $responseData = json_encode($tournoi);
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
=======
  class tournoiController extends BaseController
  {

    /**
     * ---- TODO : Commenter cette méthode ----
     */
    public function getList() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $EquipeModel = new tournoiModel();

        // ---- TODO : Commenter ce bout de code ----
        $limit = 10;
        $urlParams = $this->getQueryStringParams();
        if (isset($urlParams['limit']) && is_numeric($urlParams['limit'])) {
          $limit = $urlParams['limit'];
        }

        // ---- TODO : Commenter ce bout de code ----
        $offset = 0;
        $urlParams = $this->getQueryStringParams();
        if (isset($urlParams['page']) && is_numeric($urlParams['page']) && $urlParams['page'] > 0) {
          $offset = ($urlParams['page'] - 1) * $limit;
        }

        // ---- TODO : Commenter ce bout de code ----
        $equipes = $EquipeModel->getAlltournois($offset, $limit);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode($equipes);

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }

    /**
     * ---- TODO : Commenter cette méthode ----
     */
    public function get() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $equipeModel = new tournoiModel();

        // ---- TODO : Commenter ce bout de code ----
        $urlParams = $this->getQueryStringParams();
        if (!isset($urlParams['id']) || !is_numeric($urlParams['id'])) {
          throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        $equipe = $equipeModel->getSingletournoi($urlParams['id']);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode($tournoi);

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }

    /**
     * ---- TODO : Commenter cette méthode ----
     */
    public function store() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $equipeModel = new tournoiModel();

        // ---- TODO : Commenter ce bout de code ----
        $body = $this->getBody();
        if (!$body) {
          throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        if (!isset($body['nom'])) {
          throw new Exception("Aucun nom n'a été spécifié");
        }
        if (!isset($body['date'])) {
          throw new Exception("Aucune date n'a été spécifié");
        }
        if (!isset($body['heure_debut'])) {
          throw new Exception("Aucune heure de debut n'a été spécifié");
>>>>>>> Stashed changes
        }
  
        public function get() {
            try {
                $tournoiModel = new TournoiModel();
        
                $urlParams = $this->getQueryStringParams();
                if (!isset($urlParams['id']) || !is_numeric($urlParams['id'])) {
                    throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }
        
                $tournoi = $tournoiModel->getSingleTournoi($urlParams['id']);
        
                $responseData = json_encode($tournoi);
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
            $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
            $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
    
        public function store() {
            try {
                $tournoiModel = new TournoiModel();
        
                $body = $this->getBody();
                if (!$body) {
                    throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }

                if (!isset($body['nom'])) {
                    throw new Exception("Aucun nom n'a été spécifié");
                }
                if (!isset($body['date'])) {
                    throw new Exception("Aucun date n'a été spécifié");
                }
                if (!isset($body['heure_debut'])) {
                    throw new Exception("L'heure du debut n'a pas été spécifié");
                }
                if (!isset($body['heure_fin'])) {
                    throw new Exception("L'heure de fin n'a pas été spécifié");
                }
                if (!isset($body['lieu'])) {
                    throw new Exception("Le lieu n'a pas été spécifié");
                }
        
                $keys = array_keys($body);
                $valuesToInsert = [];
                foreach($keys as $key) {
                    if (in_array($key, [ `nom`, `date`, `heure_debut`, `heure_fin`, `lieu`])) {
                        $valuesToInsert[$key] = $body[$key];
                    }
                }
        
                $tournoi = $tournoiModel->insertTournoi($valuesToInsert);
        
                $responseData = json_encode($tournoi);
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
<<<<<<< Updated upstream
    
        public function update() {
            try {
                $tournoiModel = new TournoiModel();
        
                $body = $this->getBody();
                if (!$body) {
                    throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }
        
                if (!isset($body['id'])) {
                    throw new Exception("Aucun identifiant n'a été spécifié");
                }
        
                $keys = array_keys($body);
                $valuesToUpdate = [];
                foreach($keys as $key) {
                    if (in_array($key, [`nom`, `date`, `heure_debut`, `heure_fin`, `lieu`])) {
                        $valuesToUpdate[$key] = $body[$key];
                    }
                }
        
                $tournoi = $tournoiModel->updateTournoi($valuesToUpdate, $body['id']);
        
                $responseData = json_encode($tournoi);
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
    
        public function destroy() {
            try {
                $tournoiModel = new TournoiModel();
        
                $urlParams = $this->getQueryStringParams();
                if (!isset($urlParams['id']) || !is_numeric($urlParams['id'])) {
                    throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }
        
                $tournoi = $tournoiModel->deleteTournoi($urlParams['id']);
        
                $responseData = json_encode("Le tournoi a été correctement supprimé");
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
    }
=======

        // ---- TODO : Commenter ce bout de code ----
        $keys = array_keys($body);
        $valuesToInsert = [];
        foreach($keys as $key) {
          if (in_array($key, ['nom', 'date', 'heure_debut', 'heure_fin','lieu'])) {
            $valuesToInsert[$key] = $body[$key];
          }
        }

        // ---- TODO : Commenter ce bout de code ----
        $tournoi = $tournoiModel->inserttournoi($valuesToInsert);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode($tournoi);

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }

    /**
     * ---- TODO : Commenter cette méthode ----
     */
    public function update() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $EquipeModel = new equipeModel();

        // ---- TODO : Commenter ce bout de code ----
        $body = $this->getBody();
        if (!$body) {
          throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        if (!isset($body['id'])) {
          throw new Exception("Aucun identifiant n'a été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        $keys = array_keys($body);
        $valuesToUpdate = [];
        foreach($keys as $key) {
          if (in_array($key, ['nom', 'date', 'heure_debut', 'heure_fin','lieu'])) {
            $valuesToUpdate[$key] = $body[$key];
          }
        }

        // ---- TODO : Commenter ce bout de code ----
        $equipe = $equipeModel->updateequipe($valuesToUpdate, $body['id']);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode($equipe);

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }

    /**
     * ---- TODO : Commenter cette méthode ----
     */
    public function destroy() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $equipeModel = new equipeModel();

        // ---- TODO : Commenter ce bout de code ----
        $urlParams = $this->getQueryStringParams();
        if (!isset($urlParams['id']) || !is_numeric($urlParams['id'])) {
          throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        $equipe = $equipeModel->deletetournoi($urlParams['id']);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode("L'utilisateur a été correctement supprimé");

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }

  }
>>>>>>> Stashed changes
