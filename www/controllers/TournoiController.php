<?php

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

        public function listetournoi() {
            try {
                $tournoiModel = new TournoiModel();
        
                $tournoi = $tournoiModel->gethoraire();
        
                $responseData = json_encode($tournoi);
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
            $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
            $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        } 
    }