<?php

namespace Core;

class Application
{
    private $binds;

    public function __construct()
    {
        $this->binds[\ArticleStock\Contracts\ArticleRepository::class] = \ArticleStock\Repositories\ArticleRepository::class;
        $this->binds[\Core\DB\Connections\Contracts\Connection::class] = \Core\DB\Connections\MysqlConnection::class;
        $this->binds[\Core\Config\Contracts\Config::class] = \Core\Config\Config::class;
    }

    /**
     * @param string $class
     * @return object
     * @throws \ReflectionException
     */
    public function resolve(string $class): object
    {
        $reflectionClass = new \ReflectionClass($class);

        if (($constructor = $reflectionClass->getConstructor()) === null) {
            return $reflectionClass->newInstance();
        }

        if (($params = $constructor->getParameters()) === []) {
            return $reflectionClass->newInstance();
        }

        $newInstanceParams = [];

        foreach ($params as $param) {
            $newInstanceParams[] = $param->getType() === null ? $param->getDefaultValue() : $this->resolve(
                $this->binds[$param->getType()->getName()]
            );
        }

        return $reflectionClass->newInstanceArgs(
            $newInstanceParams
        );
    }
}
