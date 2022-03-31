<?php
namespace Core\Config\Contracts;

interface Config
{
    public function readEnvFile();

    public function parseConfig(string $content);

    public function getConfigOption($key = ''): string|array;
}
