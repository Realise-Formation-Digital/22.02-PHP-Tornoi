<?php

// ---- TODO : Commenter ce bout de code, qu'est-ce qu'il recherche ? ----
require_once __DIR__ . "/controllers/BaseController.php";
require_once __DIR__ . "/controllers/joueursController.php";

// ---- TODO : Commenter ce bout de code ----
$routes = [
  "/api/joueurs/list" => ['GET', 'JoueursController', 'getList'],
  "/api/joueurs/get" => ['GET', 'JoueursController', 'get'],
  "/api/joueurs/add" => ['POST', 'JoueursController', 'store'],
  "/api/joueurs/update" => ['PUT', 'JoueursController', 'update'],
  "/api/joueurs/remove" => ['DELETE', 'JoueursController', 'destroy'],
];
