<?php


namespace ArticleStock\Repositories;


use ArticleStock\Models\ArticleType;
use Core\Repositories\Repository;

class ArticleTypeRepository extends Repository
{
    protected string $modelClass = ArticleType::class;
}
