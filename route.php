<?php


require __DIR__ . '/bootstrap/autoload.php';

use Core\Http\Dispatcher;

$routes = [
    'GET' => [
        'index' => ['ArticleStock\Controllers\ArticleController' => 'index'],
        'show' => ['ArticleStock\Controllers\ArticleController' => 'show'],
    ],
    'PUT' => [
        'update' => ['ArticleStock\Controllers\ArticleController' => 'update'],
        'quantity-increase' => ['ArticleStock\Controllers\ArticleController' => 'increaseQuantity'],
        'quantity-decrease' => ['ArticleStock\Controllers\ArticleController' => 'decreaseQuantity'],
    ],
    'POST' => [
        'save' => ['ArticleStock\Controllers\ArticleController' => 'store'],
    ],
    'DELETE' => [
        'delete' => ['ArticleStock\Controllers\ArticleController' => 'destroy'],
    ]
];

Dispatcher::handleRequest($routes);
