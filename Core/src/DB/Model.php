<?php

namespace Core\DB;

use Core\DB\Connections\Contracts\Connection;

class Model
{
    /**
     * @var string
     */
    protected string $table;

    /**
     * @var array
     */
    protected $relations = [];

    /**
     * @var Connection
     */
    private Connection $connection;

    /**
     * Model constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function create(array $data)
    {
        //
    }

    public function get()
    {
        //

        return $this;
    }

    public function update(array $data)
    {
        //
    }

    public function find($id)
    {
        //
    }

    public function first()
    {
        //
    }

    public function delete($id)
    {
        //
    }

    /**
     * @param string $column
     * @param string $condition
     * @param string $value
     * @return Model
     */
    public function where(string $column, string $condition, string $value)
    {
        // Conditions

        return $this;
    }

    /**
     * loads
     * @param $relation
     */
    public function load($relation)
    {
        $this->relations[] = $relation;
    }
}
