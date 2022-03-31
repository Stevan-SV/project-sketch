<?php


namespace Core\DB\Repositories\Contracts;


interface Repository
{
    public function find(int $id);

    public function create(array $data): array;

    public function update(int $id, array $data);

    public function delete(int $id);

    public function get();

    public function paginate($perPage = 15);

    public function where(string $column, string $condition, string $value): self;

    public function executeQuery();
}
