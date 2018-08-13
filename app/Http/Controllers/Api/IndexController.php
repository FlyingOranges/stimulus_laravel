<?php

namespace App\Http\Controllers\Api;

use App\Models\ArticlesModel;
use App\Models\BannersModel;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Tag 首页数据
     *
     * Users Flying Oranges
     * CreateTime 2018/8/7
     * @return \Illuminate\Http\JsonResponse
     */
    public function indexPage()
    {
        $BannersModel = new BannersModel();
        $ArticlesModel = new ArticlesModel();

        $banners = $BannersModel->getIndexBanners();
        foreach ($banners as $item) {
            $item->src = getCover($item->src)->path;
        }

        $articles = $ArticlesModel->getIndexArticle();
        foreach ($articles as $item) {
            $item->cover = getCover($item->cover)->path;
        }

        $data = [
            'banners' => $banners,
            'articles' => $articles
        ];

        return apiSuccess('success', $data);
    }


}
