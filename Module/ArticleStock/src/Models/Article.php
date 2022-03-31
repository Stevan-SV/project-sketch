<?php

namespace ArticleStock\Models;

use Core\DB\Model;

class Article extends Model
{
    protected string $table = 'articles';


    public function get()
    {
        return ['test' => 'data'];
    }
}
