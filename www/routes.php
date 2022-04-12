<?php

// ---- TODO : Commenter ce bout de code, qu'est-ce qu'il recherche ? ----
require_once __DIR__ . "/controllers/BaseController.php";
require_once __DIR__ . "/controllers/EquipeController.php";
require_once __DIR__ . "/controllers/JoueurController.php";
require_once __DIR__ . "/controllers/TournoiController.php";


// ---- TODO : changer le path /api/users/... ----
$routes = [
  "/api/equipe/list" => ['GET', 'EquipeController', 'getList'],
  "/api/equipe/get" => ['GET', 'EquipeController', 'get'],
  "/api/equipe/add" => ['POST', 'EquipeController', 'store'],
  "/api/equipe/update" => ['PUT', 'EquipeController', 'update'],
  "/api/equipe/remove" => ['DELETE', 'EquipeController', 'destroy'],
  "/api/equipe/Equipe" => ['GET', 'EquipeController', 'getList'],

  "/api/joueur/list" => ['GET', 'JoueurController', 'getList'],
  "/api/joueur/get" => ['GET', 'JoueurController', 'get'],
  "/api/joueur/add" => ['POST', 'JoueurController', 'store'],
  "/api/joueur/update" => ['PUT', 'JoueurController', 'update'],
  "/api/joueur/remove" => ['DELETE', 'JoueurController', 'destroy'],
  "/api/joueur/Team" => ['GET', 'JoueurController', 'getTeam'],

  

  "/api/tournoi/list" => ['GET', 'TournoiController', 'getList'],
  "/api/tournoi/get" => ['GET', 'TournoiController', 'get'],
  "/api/tournoi/add" => ['POST', 'TournoiController', 'store'],
  "/api/tournoi/update" => ['PUT', 'TournoiController', 'update'],
  "/api/tournoi/remove" => ['DELETE', 'TournoiController', 'destroy'],
];