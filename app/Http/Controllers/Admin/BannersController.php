<?php

namespace App\Http\Controllers\Admin;

use App\Models\BannersModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $BannersModel = new BannersModel();

        $search = $request->get('search', null);
        $data = $BannersModel->getBannersList($search, $request->get('page'));

        return view(getThemeView('banner.index'), [
            'data' => $data, 'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(getThemeView('banner.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('src')) {
            $files = $request->file('src');

            $resultImage = uploadImage($files);
            if (!$resultImage->status) {
                flash($resultImage->message)->error();
                return back();
            }
        }

        $this->validate($request, [
            'title' => 'required',
            'link' => 'required',
        ], [
            'title.required' => '请填写轮播标题',
            'sex.required' => '请填写轮播链接',
        ]);

        $data = array_merge($request->except('_token', 'src'), ['src' => $resultImage->path]);

        $BannersModel = new BannersModel();
        $result = $BannersModel->createdData($data);

        if (!$result) {
            flash('轮播添加失败')->error();
            return back();
        }

        flash('轮播添加成功')->success();
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
        $BannersModel = new BannersModel();

        $data = $BannersModel->getFind($id);

        return view(getThemeView('banner.show'), ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
