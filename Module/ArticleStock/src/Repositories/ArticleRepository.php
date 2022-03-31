<?php


namespace ArticleStock\Repositories;

use ArticleStock\Models\Article;
use Core\DB\Repositories\Repository;

class ArticleRepository extends Repository implements \ArticleStock\Contracts\ArticleRepository
{
    protected string $modelClass = Article::class;

    /**
     * @param int $id
     * @param int $quantity
     * @return
     */
    public function decreaseQuantity(int $id, int $quantity)
    {
        return $this->model->where( 'quantity', '>=', $quantity)
            ->where('id', '=', $id)
            ->update(['quantity' => 'quantity - ' . $quantity]);
    }

    /**
     * @param int $id
     * @param int $quantity
     */
    public function increaseQuantity(int $id, int $quantity)
    {
        $this->model->where('id', '=', $id)
            ->update(['quantity' => 'quantity + ' . $quantity]);
    }
}
