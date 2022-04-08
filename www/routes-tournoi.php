<?php

// ---- TODO : Commenter ce bout de code, qu'est-ce qu'il recherche ? ----
require_once __DIR__ . "/controllers/BaseController.php";
require_once __DIR__ . "/controllers/TournoiController.php";

// ---- TODO : Commenter ce bout de code ----
$routes = [
  "/api/users/list" => ['GET', 'TournoiController', 'getList'],
  "/api/users/get" => ['GET', 'TournoiController', 'get'],
  "/api/users/add" => ['POST', 'TournoiController', 'store'],
  "/api/users/update" => ['PUT', 'TournoiController', 'update'],
  "/api/users/remove" => ['DELETE', 'TournoiController', 'destroy'],
];
