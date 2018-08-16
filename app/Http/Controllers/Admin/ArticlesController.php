<?php

namespace App\Http\Controllers\Admin;

use App\Models\ArticlesModel;
use Illuminate\Http\Request;

class ArticlesController extends BaseController
{
    private $ArticlesModel;

    public function __construct()
    {
        parent::__construct();
        $this->ArticlesModel = new ArticlesModel();
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search', null);

        $data = $this->ArticlesModel->getAdminList($search);

        return view(getThemeView('article.list'), ['data' => $data, 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(getThemeView('article.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->hasFile('cover')) {
            flash('请选择封面图片')->error();
            return back();
        }

        $this->validate($request, [
            'title' => 'required', 'intr' => 'required', 'conent' => 'required'
        ], [
            'title.required' => '请填写标题信息', 'intr.required' => '请填写文章简介信息',
            'conent.required' => '请填写文章内容'
        ]);

        $resultImage = uploadImage($request->file('cover'));
        if (!$resultImage->status) {
            flash('封面图片上传失败')->error();
            return back();
        }

        $data = array_merge(['cover' => $resultImage->path], $request->except('_token', 'cover'));

        $result = $this->ArticlesModel->createdData($data);
        if (!$result) {
            flash('文章信息上传失败')->error();
            return back();
        }

        flash('文章信息上传成功')->success();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->ArticlesModel->show($id);

        return view(getThemeView('article.show'), ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->ArticlesModel->show($id);

        return view(getThemeView('article.edit'), ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = [];

        if ($request->hasFile('cover')) {
            $resultImage = uploadImage($request->file('cover'));
            if ($resultImage->status) {
                $update = ['cover' => $resultImage->path];
            }
        }

        $update = array_merge($update, $request->except('_token', '_method', 'cover'));
        $result = $this->ArticlesModel->edit($update, $id);

        if (!$result) {
            flash('更新失败')->error();
            return back();
        }

        flash('更新成功')->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $int = $this->ArticlesModel->edit(['status' => $this->ArticlesModel::STATUS_DELETE], $id);
        if (!$int) {
            return apiErrors('删除失败');
        }

        return apiSuccess('删除成功');
    }
}
