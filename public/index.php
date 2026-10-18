<?php

define('BASE_PATH', dirname(__DIR__));

session_start([
    'cookie_httponly' => true, // sécurité  JavaScript pas lire le cookie
]);

require BASE_PATH . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->safeLoad();

// alias d'URL dont le slug ne correspond pas au nom de la classe
// (connexion/deconnexion/... -> Login, inscription -> Register)
class_alias(App\Controllers\Login::class, 'App\\Controllers\\Connexion');
class_alias(App\Controllers\Login::class, 'App\\Controllers\\Deconnexion');
class_alias(App\Controllers\Login::class, 'App\\Controllers\\MotDePasseOublie');
class_alias(App\Controllers\Login::class, 'App\\Controllers\\Reinitialiser');
class_alias(App\Controllers\Register::class, 'App\\Controllers\\Inscription');

// routeur regarde l'URL lance contrôleur
$router = new App\Core\Router();