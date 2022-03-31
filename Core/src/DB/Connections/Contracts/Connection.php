<?php

namespace Core\DB\Connections\Contracts;

interface Connection
{
    public function connect(): \PDO;
}
