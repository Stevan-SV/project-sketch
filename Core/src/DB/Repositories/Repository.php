<?php

namespace Core\DB\Repositories;


use Core\Application;

class Repository implements \Core\DB\Repositories\Contracts\Repository
{
    protected string $modelClass = '';

    protected $model;

    protected array $wheres = [];

    public function __construct()
    {
        $application = new Application();
        $this->model = $application->resolve($this->modelClass);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->model->where('id', '=', $id)->first();
    }

    /**
     * @param array $data
     * @return array
     */
    public function create(array $data): array
    {
        return $this->model->create($data)->toArray();
    }

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update(int $id, array $data)
    {
        return $this->find($id)->update($data);
    }

    public function delete(int $id)
    {
        return $this->find($id)->delete($id);
    }

    public function get()
    {
        return $this->model->get();
    }

    /**
     * @param string $column
     * @param string $condition
     * @param string $value
     * @return Repository
     */
    public function where(string $column, string $condition, string $value): self
    {
        $this->wheres[] = [$column, $condition, $value];

        return $this;
    }

    /**
     * @param int $perPage
     * @param string[] $columns
     */
    public function paginate($perPage = 15)
    {
        // TODO: Implement paginate() method.
    }

    /**
     * @return mixed
     */
    public function executeQuery()
    {
        return $this->model->where($this->wheres);
    }
}
