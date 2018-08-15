<?php

namespace App\Http\Controllers\Admin;

use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index()
    {
        return view(getThemeView('home.index'));
    }

    /**
     * Tag 后台文本富文本框上传图片接口
     *
     * Users Flying Oranges
     * CreateTime 2018/8/15
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function wangEditorUploadImage(Request $request)
    {
        $files = $request->allFiles();
        $keys = array_keys($files);

        $imageUrl = [];
        foreach ($keys as $key) {
            $result = uploadImage($files[$key]);
            if ($result->status) {
                $imageUrl[] = getCover($result->path)->path;
            }
        }

        return response()->json(['errno' => 0, 'data' => $imageUrl]);
    }
}
