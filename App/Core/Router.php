<?php
/**
 * @file Router.php
 * @brief Charge et résout les routes HTTP vers les contrôleurs associés.
 *
 * Le fichier de configuration `routes.json` est analysé pour associer une URL
 * à une classe de contrôleur, puis le bon contrôleur est instancié.
 *
 * @author Brandon
 * @author Aymen
 * @author Imen
 * @author Milan
 * @date 2026
 */
declare(strict_types=1);

namespace App\Core;

/**
 * @brief Charge et résout les routes HTTP vers les contrôleurs associés.
 *
 * Le fichier de configuration `routes.json` est analysé pour associer une URL
 * à une classe de contrôleur, puis le bon contrôleur est instancié.
 */
class Router
{
    private const ROUTE_ERROR = 'App\\Controllers\\PageNotFound';
    private const ROUTE_HOME = 'App\\Controllers\\HomeController';
  
    public function __construct() {
        $this->loadRoute();
    }
    private function loadRoute() : void {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        if ($url === '/') {
            $controller = self::ROUTE_HOME;
            (new $controller())->execute();
            return;
        }
        
        $args = explode('/', trim($url, '/'));
        $route = $route = 'App\\Controllers\\' . str_replace('_', '', ucwords($args[0], '_'));
        $method = $args[1] ?? 'execute';
        $options = array_slice($args, 2);
        if (class_exists($route) && method_exists($route, $method)) {
            try {
                (new $route())->$method(...$options);
                return;
            } catch (\Error $e) {
                $controller = self::ROUTE_ERROR;
                (new $controller())->execute();
                return;
            }
        } 
        $controller = self::ROUTE_ERROR;
        (new $controller())->execute();

    }
}