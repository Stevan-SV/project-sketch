<?php

namespace Core\Http;


use Core\Application;

class Dispatcher
{
    /**
     * @param $routes
     * @throws \ReflectionException
     */
    public static function handleRequest($routes)
    {
        $request = new Request();

        $application = new Application();

        $requestMethod = $request->getMethod();
        $requestRoute = $request->currentRoute();

        if (isset($routes[$requestMethod][$requestRoute])) {

            Router::setControllerMethod($routes[$requestMethod][$requestRoute]);

            $controller = Router::getController();
            $method = Router::getMethod();

            if (!class_exists($controller)) {
                exit('Controller: ' . $controller . ' doesn\'t exists');
            }

            $controllerObj = $application->resolve($controller);

            if (!method_exists($controllerObj, $method)) {
                exit('Controller method: ' . $method . ' doesn\'t exists');
            }

            $controllerObj->{$method}($request);
        }
    }
}
