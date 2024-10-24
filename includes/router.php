<?php

function routeToController($uri, $routes)
{
  $uri = rtrim($uri, '/');
  $uriWithoutQuery = parse_url($uri, PHP_URL_PATH);

  if (array_key_exists($uriWithoutQuery, $routes)) {
    $queryString = parse_url($_SERVER["REQUEST_URI"], PHP_URL_QUERY);
    $params = [];
    if ($queryString) {
      parse_str($queryString, $params);
    }
    require $routes[$uriWithoutQuery];
    return $params;
  } else {
    abort();
  }
}

function abort($code = 404)
{
  http_response_code($code);
  $messages = [
    404 => "Not Found",
    405 => "Method Not Allowed",
    500 => "Internal Server Error"
  ];

  echo json_encode([
    "status" => $code,
    "message" => $messages[$code] ?? "Unknown Error"
  ]);
  exit();
}

$routes = [
  "" => "controllers/onboarding.php",
  "/register-patients" => "controllers/patient.php"
];

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$params = routeToController($uri, $routes);
