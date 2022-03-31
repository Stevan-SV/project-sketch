<?php

namespace Core\Config;

class Config implements \Core\Config\Contracts\Config
{
    protected array $config;

    /**
     * Config constructor.
     */
    public function __construct()
    {
        $this->readEnvFile();
    }
    /**
     *
     */
    public function readEnvFile()
    {
        $configFile = __DIR__ . '/../../../.env';
        $content = file_get_contents($configFile);

        $this->parseConfig($content);
    }

    /**
     * @param string $content
     */
    public function parseConfig(string $content)
    {
        $params = explode("\n", $content);

        // getting variables logic

        $this->config = $params;
    }

    /**
     * @param string $key
     * @return array|string
     */
    public function getConfigOption($key = ''): string|array
    {
        if (isset($this->config[$key])) {
            return $this->config[$key];
        }

        return '';
    }
}
