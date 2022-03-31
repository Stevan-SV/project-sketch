<?php


namespace Core\DB\Connections;


use Core\Config\Contracts\Config;
use Core\DB\ConnectionException;

class MysqlConnection implements \Core\DB\Connections\Contracts\Connection
{
    private string $dbHost;
    private string $dbName;
    private string $dbUser;
    private string $dbPassword;

    public function __construct(Config $config)
    {
        $database = $config->getConfigOption('database');

        $this->dbName = $database['db_name'] ?? '';
        $this->dbHost = $database['db_host'] ?? '';
        $this->dbUser = $database['db_user'] ?? '';
        $this->dbPassword = $database['db_password'] ?? '';
    }

    /**
     * @return \PDO
     * @throws ConnectionException
     */
    public function connect(): \PDO
    {
        try {

            $dsn = sprintf("mysql:host=%s;dbname=%s", $this->dbHost, $this->dbName);
            return new \PDO($dsn, $this->dbUser, $this->dbPassword);

        } catch (\PDOException $ex) {
            throw new ConnectionException(
                'Connection to mysql failed: ',
                $ex->getMessage(),
                $ex->getCode()
            );
        }
    }
}
