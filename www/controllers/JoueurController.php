<?php
    require_once __DIR__ . "/../models/JoueurModel.php";

    class JoueurController extends BaseController{

        public function getList() {
            try {
                $joueurModel = new JoueurModel();

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

                $joueur = $joueurModel->getAllJoueur($offset, $limit);

                $responseData = json_encode($joueur);

                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
        public function getTeam() {
            try {
                $joueurModel = new JoueurModel();

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

                $joueur = $joueurModel->getTeamate($offset, $limit);

                $responseData = json_encode($joueur);

                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }

        public function get() {
            try {
                $joueurModel = new JoueurModel();

                $urlParams = $this->getQueryStringParams();
                if (!isset($urlParams['id']) || !is_numeric($urlParams['id'])) {
                    throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }
                $joueur = $joueurModel->getSingleJoueur($urlParams['id']);

                $responseData = json_encode($joueur);

                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }

        public function store() {
            try {
                $joueurModel = new JoueurModel();

                $body = $this->getBody();
                if (!$body) {
                    throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }

                if (!isset($body['nom'])) {
                    throw new Exception("Aucun nom n'a été spécifié");
                }
                if (!isset($body['age'])) {
                    throw new Exception("Aucun téléphone n'a été spécifié");
                }
                if (!isset($body['nationalité'])) {
                    throw new Exception("Aucun e-mail n'a été spécifié");
                }
                if (!isset($body['equipe'])) {
                    throw new Exception("Aucun profile n'a été spécifié");
                }

                $keys = array_keys($body);
                $valuesToInsert = [];
                foreach($keys as $key) {
                    if (in_array($key, [`nom`, `age`, `nationalité`, `equipe`])) {
                    $valuesToInsert[$key] = $body[$key];
                    }
                }

                $joueur = $joueurModel->insertJoueur($valuesToInsert);

                $responseData = json_encode($joueur);

                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }

        public function update() {
            try {
                $joueurModel = new JoueurModel();

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
                    if (in_array($key, [`nom`, `age`, `nationalité`, `equipe`])) {
                    $valuesToUpdate[$key] = $body[$key];
                    }
                }

                $joueur = $joueurModel->updateJoueur($valuesToUpdate, $body['id']);

                $responseData = json_encode($joueur);

                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }

        public function destroy() {
            try {
                $joueurModel = new JoueurModel();

                $urlParams = $this->getQueryStringParams();
                if (!isset($urlParams['id']) || !is_numeric($urlParams['id'])) {
                throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }

                $joueur = $joueurModel->deleteJoueur($urlParams['id']);

                $responseData = json_encode("Le joueur a été correctement supprimé");

                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
    }