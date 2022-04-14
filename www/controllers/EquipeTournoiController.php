<?php

    require_once __DIR__ . "/../models/EquipeTournoiModel.php";

    class EquipeTournoiController extends BaseController {
        
        public function store() {
            try {
                $EquipeTournoiModel = new EquipeTournoiModel();
        
                $body = $this->getBody();
                if (!$body) {
                    throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }

                if (!isset($body['equipe_id'])) {
                    throw new Exception("Aucune equipe_id n'a été spécifié");
                }
                if (!isset($body['tournoi_id'])) {
                    throw new Exception("Aucun tournoi_id n'a été spécifié");
                }

                $equipeTournoi = $EquipeTournoiModel->insertEquipeTournoi($body['equipe_id'], $body['tournoi_id']);
        
                $responseData = json_encode($equipeTournoi);
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }

        public function destroy() {
            try {
                $EquipeTournoiModel = new EquipeTournoiModel();
        
                $urlParams = $this->getQueryStringParams();
                if (!isset($urlParams['equipe_id']) || !is_numeric($urlParams['equipe_id'])) {
                    throw new Exception("L'identifiant equipe est incorrect ou n'a pas été spécifié");
                    }

                if (!isset($urlParams['tournoi_id']) || !is_numeric($urlParams['tournoi_id'])) {
                    throw new Exception("L'identifiant tournoi est incorrect ou n'a pas été spécifié");
                    }
        
                $equipeTournoi = $EquipeTournoiModel->deleteEquipeTournoi($urlParams['equipe_id'], $urlParams['tournoi_id']);
        
                $responseData = json_encode("L'equipe_tournoi a été correctement supprimé");
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
    }