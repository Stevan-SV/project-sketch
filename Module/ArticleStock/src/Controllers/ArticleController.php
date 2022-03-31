<?php

namespace ArticleStock\Controllers;

use ArticleStock\Contracts\ArticleRepository;

use Core\Http\Request;
use Core\Http\Response;

class ArticleController
{
    /**
     * @var ArticleRepository
     */
    private ArticleRepository $articleRepository;

    /**
     * ArticleController constructor.
     * @param ArticleRepository $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @return false|string
     */
    public function index()
    {
        $articles = $this->articleRepository->get();

        return (new Response())->json(['data' => $articles]);
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function show(Request $request)
    {
        $id = $request->getField('id');

        $article = $this->articleRepository->find($id);


        return (new Response())->json(['data' => $article]);
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function store(Request $request)
    {
        $data = $request->validate([]);

        return (new Response())->json(['data' => $this->articleRepository->create($data)]);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function destroy(Request $request)
    {
        $id = $request->getField('id');

        return $this->articleRepository->delete($id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $id = $request->getField('id');
        $data = $request->validate([]);

        return response()->json(['data' => $this->articleRepository->update($id, $data)]);
    }

    /**
     * @param Request $request
     * @return
     * @throws \Illuminate\Validation\ValidationException
     */
    public function increaseQuantity(Request $request)
    {
        $data = $request->validate([]);

        $id = $request->getField('id');

        return $this->articleRepository->increaseQuantity($id, $data['quantity']);
    }

    /**
     * @param Request $request
     * @return
     * @throws \Illuminate\Validation\ValidationException
     */
    public function decreaseQuantity(Request $request)
    {
        $data = $request->validate([]);

        $id = $request->getField('id');

        return $this->articleRepository->decreaseQuantity($id, $data['quantity']);
    }
}
