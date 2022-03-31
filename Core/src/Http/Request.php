<?php

namespace Core\Http;

class Request
{
    private string $requestMethod;
    private array $vars = [];
    private array $routes = [];

    /**
     * Http constructor.
     */
    public function __construct()
    {
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
        $this->setVars();

    }

    /**
     * @return array
     */
    public function getMethod()
    {
        return $this->requestMethod;
    }

    /**
     *
     */
    public function setVars()
    {
        foreach($_POST as $key => $val) {

            $this->vars[$key] = $val;
        }
        $i = 0;

        foreach($_GET as $key => $val) {

            if ($i == 0) {

                $this->routes[] = $key;
                $i++;
            }

            $this->vars[$key] = $val;
        }
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->vars;
    }

    /**
     * @param string $field
     * @return mixed
     */
    public function getField(string $field)
    {
        if (isset($this->vars[$field])) {
            return $this->vars[$field];
        }

        return '';
    }

    /**
     * @return mixed|string
     */
    public function currentRoute()
    {
        return $this->routes[0] ?? '';
    }

    public function validate(array $rules)
    {
        //TODO some validation and return data
        return $this->vars;
    }
}
