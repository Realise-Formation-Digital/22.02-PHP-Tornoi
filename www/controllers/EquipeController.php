<?php

    require_once __DIR__ . "/../models/EquipeModel.php";

    class EquipeController extends BaseController {

        public function getList() {
            try {
                $EquipeModel = new EquipeModel();
        
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
        
                $equipe = $EquipeModel->getAllEquipe($offset, $limit);
        
                $responseData = json_encode($equipe);
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
  
        public function get() {
            try {
                $EquipeModel = new EquipeModel();
        
                $urlParams = $this->getQueryStringParams();
                if (!isset($urlParams['id']) || !is_numeric($urlParams['id'])) {
                    throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }
        
                $equipe = $EquipeModel->getSingleEquipe($urlParams['id']);
        
                $responseData = json_encode($equipe);
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
            $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
            $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
    
        public function store() {
            try {
                $EquipeModel = new EquipeModel();
        
                $body = $this->getBody();
                if (!$body) {
                    throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }

                if (!isset($body['nom'])) {
                    throw new Exception("Aucun nom n'a été spécifié");
                }
                if (!isset($body['entraineur'])) {
                    throw new Exception("Aucun entraineur n'a été spécifié");
                }
                if (!isset($body['logo'])) {
                    throw new Exception("Le logo n'a pas été spécifié");
                }
        
                $keys = array_keys($body);
                $valuesToInsert = [];
                foreach($keys as $key) {
                    if (in_array($key, [`nom`, `entraineur`, `logo`])) {
                        $valuesToInsert[$key] = $body[$key];
                    }
                }
        
                $equipe = $EquipeModel->insertEquipe($valuesToInsert);
        
                $responseData = json_encode($equipe);
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
    
        public function update() {
            try {
                $EquipeModel = new EquipeModel();
        
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
                    if (in_array($key, [`nom`, `entraineur`, `logo`])) {
                        $valuesToUpdate[$key] = $body[$key];
                    }
                }
        
                $equipe = $EquipeModel->updateEquipe($valuesToUpdate, $body['id']);
        
                $responseData = json_encode($equipe);
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
    
        public function destroy() {
            try {
                $EquipeModel = new EquipeModel();
        
                $urlParams = $this->getQueryStringParams();
                if (!isset($urlParams['id']) || !is_numeric($urlParams['id'])) {
                    throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }
        
                $equipe = $EquipeModel->deleteEquipe($urlParams['id']);
        
                $responseData = json_encode("L'equipe a été correctement supprimé");
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
        
        public function listentraineurs() {
            try {
                $EquipeModel = new EquipeModel();
        
                $equipe = $EquipeModel->getentraineurs();
        
                $responseData = json_encode($equipe);
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
            $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
            $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        } 

        public function listeequipetournoi() {
            try {
                $EquipeModel = new EquipeModel();
        
                $equipe = $EquipeModel->getequipeTournoi();
        
                $responseData = json_encode($equipe);
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
            $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
            $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }

    }