<?php

namespace ArticleStock\Contracts;


use Core\DB\Repositories\Contracts\Repository;

interface ArticleRepository extends Repository
{
    public function decreaseQuantity(int $id, int $quantity);

    public function increaseQuantity(int $id, int $quantity);
}
