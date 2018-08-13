<?php

namespace App\Http\Controllers\Api;

use App\Models\ArticlesModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Tag 图文列表
     *
     * Users Flying Oranges
     * CreateTime 2018/8/7
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function lists(Request $request)
    {
        $ArticlesModel = new ArticlesModel();

        $page = $request->get('page', 1);
        $articles = $ArticlesModel->getIndexArticleList($page);
        foreach ($articles as $item) {
            $item->cover = getCover($item->cover)->path;
        }

        return apiSuccess('success', $articles);
    }

    /**
     * Tag 文章详情
     *
     * Users Flying Oranges
     * CreateTime 2018/8/8
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function articles($id = null)
    {
        $ArticlesModel = new ArticlesModel();
        $data = $ArticlesModel->getArticleInfo($id);

        return apiSuccess('success', $data);
    }
}
