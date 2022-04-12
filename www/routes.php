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

  "/api/joueur/list" => ['GET', 'joueurController', 'getList'],
  "/api/joueur/get" => ['GET', 'joueurController', 'get'],
  "/api/joueur/add" => ['POST', 'joueurController', 'store'],
  "/api/joueur/update" => ['PUT', 'joueurController', 'update'],
  "/api/joueur/remove" => ['DELETE', 'joueurController', 'destroy'],

  "/api/tournoi/list" => ['GET', 'TournoiController', 'getList'],
  "/api/tournoi/get" => ['GET', 'TournoiController', 'get'],
  "/api/tournoi/add" => ['POST', 'TournoiController', 'store'],
  "/api/tournoi/update" => ['PUT', 'TournoiController', 'update'],
  "/api/tournoi/remove" => ['DELETE', 'TournoiController', 'destroy'],
  "/api/tournoi/Tournoi" => ['GET', 'TournoiController', 'gettournoi'],
];